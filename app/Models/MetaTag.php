<?php
/**
 * LaraClassifier - Classified Ads Web Application
 * Copyright (c) BeDigit. All Rights Reserved
 *
 * Website: https://laraclassifier.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use App\Observers\MetaTagObserver;
use Larapen\Admin\app\Models\Traits\Crud;
use Larapen\Admin\app\Models\Traits\SpatieTranslatable\HasTranslations;

class MetaTag extends BaseModel
{
	use Crud, HasTranslations;
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'meta_tags';
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	// protected $primaryKey = 'id';
	
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var boolean
	 */
	public $timestamps = false;
	
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['page', 'title', 'description', 'keywords', 'active'];
	public $translatable = ['title', 'description', 'keywords'];
	
	/**
	 * The attributes that should be hidden for arrays
	 *
	 * @var array
	 */
	// protected $hidden = [];
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	// protected $dates = [];
	
	// Default Pages
	private static $defaultPages = [
		'home'           => 'Homepage',
		'search'         => 'Search (Default)',
		'searchCategory' => 'Search (Category)',
		'searchLocation' => 'Search (Location)',
		'searchProfile'  => 'Search (Profile)',
		'searchTag'      => 'Search (Tag)',
		'adDetails'      => 'Ad Details',
		'register'       => 'Register',
		'login'          => 'Login',
		'create'         => 'Ads Creation',
		'countries'      => 'Countries',
		'contact'        => 'Contact',
		'sitemap'        => 'Sitemap',
		'password'       => 'Password',
		'pricing'        => 'Pricing',
		'staticPage'     => 'Page (Static)',
	];
	
	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	protected static function boot()
	{
		parent::boot();
		
		MetaTag::observe(MetaTagObserver::class);
		
		static::addGlobalScope(new ActiveScope());
	}
	
	public static function getDefaultPages()
	{
		return self::$defaultPages;
	}
	
	/**
	 * @param bool $xPanel
	 * @return string
	 */
	public function resetEntriesBtn($xPanel = false)
	{
		$confirm = addslashes(trans('admin.confirm_this_action'));
		$onClick = ' onclick="return confirm(\'' . $confirm . '\')"';
		
		$url = admin_url('meta_tags/reset');
		
		$msg = trans('admin.reset_entries_btn_hint');
		$tooltip = ' data-bs-toggle="tooltip" title="' . $msg . '"';
		
		// Button
		$out = '';
		$out .= '<a class="btn btn-warning shadow"' . $onClick . ' href="' . $url . '"' . $tooltip . '>';
		$out .= '<i class="fas fa-undo"></i> ';
		$out .= trans('admin.reset_entries_btn_label');
		$out .= '</a>';
		
		return $out;
	}
	
	public function getPageHtml()
	{
		$entries = self::getDefaultPages();
		
		// Get Page Name
		$out = $this->page;
		if (isset($entries[$this->page])) {
			$url = admin_url('meta_tags/' . $this->id . '/edit');
			$out = '<a href="' . $url . '">' . $entries[$this->page] . '</a>';
		}
		
		return $out;
	}
	
	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	
	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/
	
	/*
	|--------------------------------------------------------------------------
	| ACCESSORS
	|--------------------------------------------------------------------------
	*/
	
	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}