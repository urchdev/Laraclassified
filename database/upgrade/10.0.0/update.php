<?php

try {
	
	/* FILES */
	\File::delete(resource_path('views/auth/login.blade.php'));
	\File::delete(resource_path('views/layouts/inc/modal/login.blade.php'));
	
	
	/* DATABASE */
	if (!\Schema::hasColumn('categories', 'hide_description')) {
		\Schema::table('categories', function ($table) {
			if (\Schema::hasColumn('categories', 'description')) {
				$table->boolean('hide_description')->nullable()->after('description');
			} else {
				$table->boolean('hide_description')->nullable()->after('icon_class');
			}
		});
	}
	if (!\Schema::hasColumn('categories', 'seo_title')) {
		\Schema::table('categories', function ($table) {
			$table->text('seo_title')->nullable()->after('icon_class');
		});
	}
	if (!\Schema::hasColumn('categories', 'seo_description')) {
		\Schema::table('categories', function ($table) {
			$table->text('seo_description')->nullable()->after('seo_title');
		});
	}
	if (!\Schema::hasColumn('categories', 'seo_keywords')) {
		\Schema::table('categories', function ($table) {
			$table->text('seo_keywords')->nullable()->after('seo_description');
		});
	}
	
	if (!\Schema::hasColumn('pages', 'seo_title')) {
		\Schema::table('pages', function ($table) {
			$table->text('seo_title')->nullable()->after('target_blank');
		});
	}
	if (!\Schema::hasColumn('pages', 'seo_description')) {
		\Schema::table('pages', function ($table) {
			$table->text('seo_description')->nullable()->after('seo_title');
		});
	}
	if (!\Schema::hasColumn('pages', 'seo_keywords')) {
		\Schema::table('pages', function ($table) {
			$table->text('seo_keywords')->nullable()->after('seo_description');
		});
	}
	
	checkAndDropIndex('posts', 'tags');
	if (\Schema::hasColumn('posts', 'tags')) {
		\Schema::table('posts', function ($table) {
			$table->text('tags')->nullable()->change();
		});
	}
	
	if (!\Schema::hasColumn('pictures', 'mime_type')) {
		\Schema::table('pictures', function ($table) {
			$table->string('mime_type', 200)->nullable()->after('filename');
		});
	}
	
	// Insert a New Home Section
	$tableName = (new \App\Models\HomeSection())->getTable();
	$setting = \DB::table($tableName)->where('method', 'getTextArea')->first();
	if (empty($setting)) {
		$homeTxtAreaData = [
			'method'    => 'getTextArea',
			'name'      => 'Text Area',
			'value'     => null,
			'view'      => 'home.inc.text-area',
			'field'     => null,
			'parent_id' => null,
			'lft'       => '12',
			'rgt'       => '13',
			'depth'     => '1',
			'active'    => '0',
		];
		\DB::table($tableName)->insert($homeTxtAreaData);
	}
	
	// Reset the MetaTags table
	\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	$table = \DB::getTablePrefix() . (new \App\Models\MetaTag())->getTable();
	\DB::statement('TRUNCATE TABLE ' . $table . ';');
	\Artisan::call('db:seed', [
		'--class' => 'MetaTagSeeder',
		'--force' => true,
	]);
	\DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	
} catch (\Exception $e) {
	dump($e->getMessage());
	dd('in ' . str_replace(base_path(), '', __FILE__));
}


// Check & Drop Indexes
function checkAndDropIndex($tableName, $indexName)
{
	// Check & Drop Index using MySQL
	$tableNameWithPrefix = \DB::getTablePrefix() . $tableName;
	$idxDb = \DB::connection()->getDatabaseName();
	$sql = [
		'Key_name'   => 'SHOW INDEX FROM ' . $tableNameWithPrefix . ' FROM ' . $idxDb,
		'INDEX_NAME' => 'SELECT DISTINCT INDEX_NAME
						 FROM `INFORMATION_SCHEMA`.`STATISTICS`
						 WHERE `TABLE_SCHEMA` = \'' . $idxDb . '\'
							AND `TABLE_NAME` = \'' . $tableNameWithPrefix . '\'',
	];
	$isMySql8OrGreater = (!\App\Helpers\DBTool::isMariaDB() && \App\Helpers\DBTool::isMySqlMinVersion('8.0'));
	$indexColumn = $isMySql8OrGreater ? 'INDEX_NAME' : 'Key_name';
	$results = \DB::select(\DB::raw($sql[$indexColumn]));
	if (is_array($results) && count($results) > 0) {
		$results = collect($results)->mapWithKeys(function ($item) use ($indexColumn) {
			$indexNameLocal = $item->{$indexColumn} ?? null;
			
			return [$indexNameLocal => $indexNameLocal];
		})->toArray();
		
		if (in_array($indexName, $results)) {
			$sql = "ALTER TABLE `" . $tableNameWithPrefix . "` DROP INDEX " . $indexName . ";" . "\n";
			\DB::unprepared($sql);
		}
	}
	
	// Check & Drop Index using Laravel
	\Schema::table($tableName, function ($table) use ($tableName, $indexName) {
		$sm = \Schema::getConnection()->getDoctrineSchemaManager();
		$indexesFound = $sm->listTableIndexes(\DB::getTablePrefix() . $tableName);
		
		$indexRawName = \DB::getTablePrefix() . $tableName . '_' . $indexName . '_index';
		if (array_key_exists($indexRawName, $indexesFound)) {
			$table->dropIndex([$indexName]);
		}
	});
}
