<?php

namespace Database\Seeders;

use App\Models\MetaTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaTagSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$entries = [
			[
				'page'        => 'home',
				'title'       => [
					'en' => '{app.name} - Geo Classified Ads CMS',
					'fr' => '{app.name} - CMS d\'annonces classées et géolocalisées',
				],
				'description' => [
					'en' => '{app.name} - Geo Classified Ads CMS. Buy and sell products and services on {app.name} in minutes. Classified ads in {country.name}. Looking for a product or service?',
					'fr' => '{app.name} - CMS d\'annonces classées et géolocalisées. Acheter et vendre des biens et services en quelques minutes sur {app.name}. Petites annonces, {country.name}. A la recherche d\'un produit ou d\'un service ?',
				],
				'keywords'    => [
					'en' => 'classified, classified ads, free classified, classified site, listing, directory, premium ads, {country.name}, {app.name}',
					'fr' => 'petites annonces, annonces classées, annonces gratuites, site d\'annonces, annuaire, annonces premium, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'search',
				'title'       => null,
				'description' => null,
				'keywords'    => null,
				'active'      => '1',
			],
			[
				'page'        => 'searchCategory',
				'title'       => [
					'en' => '{category.title}',
					'fr' => '{category.title}',
				],
				'description' => [
					'en' => '{category.description}',
					'fr' => '{category.description}',
				],
				'keywords'    => [
					'en' => '{category.keywords}',
					'fr' => '{category.keywords}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'searchLocation',
				'title'       => null,
				'description' => null,
				'keywords'    => null,
				'active'      => '1',
			],
			[
				'page'        => 'searchProfile',
				'title'       => null,
				'description' => null,
				'keywords'    => null,
				'active'      => '1',
			],
			[
				'page'        => 'searchTag',
				'title'       => null,
				'description' => null,
				'keywords'    => null,
				'active'      => '1',
			],
			[
				'page'        => 'adDetails',
				'title'       => [
					'en' => '{ad.title} - {location.name}, {country.name}',
					'fr' => '{ad.title} - {location.name}, {country.name}',
				],
				'description' => [
					'en' => '{ad.description}',
					'fr' => '{ad.description}',
				],
				'keywords'    => [
					'en' => '{ad.tags}, {country.name}, {app.name}',
					'fr' => '{ad.tags}, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'register',
				'title'       => [
					'en' => 'Sign Up - {app.name}',
					'fr' => 'S\'inscrire - {app.name}',
				],
				'description' => [
					'en' => 'Become a reliable seller or buyer. Create and manage announcements. Re-publish old ads, etc. Create a list of favorites. Signing up on {app.name} is 100% free and in just a few clicks.',
					'fr' => 'Devenir un vendeur ou un acheteur fiable. Créer et gérer des annonces. Re-publier une anciennes annonces, etc. Créer une liste de favoris. S\'inscrire sur {app.name}, c\'est 100% gratuit et en quelques clics.',
				],
				'keywords'    => [
					'en' => 'register, signup, classified, classified ads, free classified, classified site, premium ads, {country.name}, {app.name}',
					'fr' => 's\inscrire, inscription, petites annonces, annonces classées, annonces gratuites, site d\'annonces, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'login',
				'title'       => [
					'en' => 'Login - {app.name}',
					'fr' => 'S\'identifier - {app.name}',
				],
				'description' => [
					'en' => 'Identify yourself as a reliable seller or buyer on {app.name}. Create and manage announcements. Re-publish old ads, etc. Create a list of favorites.',
					'fr' => 'S\'identifier en tant que vendeur ou acheteur fiable sur {app.name}. Créer et gérer des annonces. Re-publier une anciennes annonces, etc. Créer une liste de favoris.',
				],
				'keywords'    => [
					'en' => 'login, signin, classified, classified ads, free classified, classified site, premium ads, {country.name}, {app.name}',
					'fr' => 'authentification, identification, petites annonces, annonces classées, annonces gratuites, site d\'annonces, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'create',
				'title'       => [
					'en' => 'Post a free ad - {app.name}',
					'fr' => 'Publier une annonce gratuite - {app.name}',
				],
				'description' => [
					'en' => 'Do you have something to sell, to rent, a service to offer or a job offer in {country.name}? Publish your ads or events for free on {app.name}, it\'s 100% free, reliable, local business and very easy to use!',
					'fr' => 'Avez-vous quelque chose à vendre, à louer, un service à offrir ou une offre d\'emploi - {country.name} ? Publiez gratuitement vos annonces ou événements sur {app.name}, c\'est 100% gratuit, fiable, pensé business local et très facile à utiliser!',
				],
				'keywords'    => [
					'en' => 'post ads, add listing, classified, classified ads, free classified, classified site, premium ads, {country.name}, {app.name}',
					'fr' => 'poster une annonce, publier une annonce, petites annonces, annonces classées, annonces gratuites, site d\'annonces, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'countries',
				'title'       => [
					'en' => 'Free Local Classified Ads in the World',
					'fr' => 'Petites annonces classées dans le monde',
				],
				'description' => [
					'en' => 'Welcome to {app.name} : 100% Free Ads Classified. Sell and buy near you. Simple, fast and efficient.',
					'fr' => 'Bienvenue sur {app.name} : Site de petites annonces 100% gratuit. Vendez et achetez près de chez vous. Simple, rapide et efficace.',
				],
				'keywords'    => [
					'en' => 'countries list, classified, classified ads, free classified, classified site, premium ads, {country.name}, {app.name}',
					'fr' => 'liste des pays, petites annonces, annonces classées, annonces gratuites, site d\'annonces, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'contact',
				'title'       => [
					'en' => 'Contact Us - {app.name}',
					'fr' => 'Nous contacter - {app.name}',
				],
				'description' => [
					'en' => 'Contact Us - {app.name}',
					'fr' => 'Nous contacter - {app.name}',
				],
				'keywords'    => [
					'en' => 'contact us, classified, classified ads, free classified, classified site, premium ads, {country.name}, {app.name}',
					'fr' => 'contactez-nous, petites annonces, annonces classées, annonces gratuites, site d\'annonces, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'sitemap',
				'title'       => [
					'en' => 'Sitemap {app.name} - {country.name}',
					'fr' => 'Plan du site {app.name} - {country.name}',
				],
				'description' => [
					'en' => 'Sitemap {app.name} - {country.name}. 100% Free Ads Classified',
					'fr' => 'Plan du site {app.name} - {country.name}. Site de petites annonces 100% gratuit dans le Monde. Vendez et achetez près de chez vous. Simple, rapide et efficace.',
				],
				'keywords'    => [
					'en' => 'sitemap, classified, classified ads, free classified, classified site, premium ads, {country.name}, {app.name}',
					'fr' => 'plan du site, petites annonces, annonces classées, annonces gratuites, site d\'annonces, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'password',
				'title'       => [
					'en' => 'Lost your password? - {app.name}',
					'fr' => 'Mot de passe oublié? - {app.name}',
				],
				'description' => [
					'en' => 'Lost your password? - {app.name}',
					'fr' => 'Mot de passe oublié? - {app.name}',
				],
				'keywords'    => [
					'en' => 'forgot password, classified, classified ads, free classified, classified site, premium ads, {country.name}, {app.name}',
					'fr' => 'mot de passe oublié, petites annonces, annonces classées, annonces gratuites, site d\'annonces, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'pricing',
				'title'       => [
					'en' => 'Pricing of classified ads posting - {app.name}',
					'fr' => 'Tarifs de publication de petites annonces - {app.name}',
				],
				'description' => [
					'en' => 'Classified ads posting pricing, post a premium ad, sponsor your classified ads on {app.name} - {country.name}',
					'fr' => 'Tarifs de publication de petites annonces, publier une annonce premium, sponsoriser vos petites annonces sur {app.name} - {country.name}',
				],
				'keywords'    => [
					'en' => 'pricing, classified, classified ads, free classified, classified site, premium ads, {country.name}, {app.name}',
					'fr' => 'tarifs, petites annonces, annonces classées, annonces gratuites, site d\'annonces, {country.name}, {app.name}',
				],
				'active'      => '1',
			],
			[
				'page'        => 'staticPage',
				'title'       => [
					'en' => '{page.title}',
					'fr' => '{page.title}',
				],
				'description' => [
					'en' => '{page.description}',
					'fr' => '{page.description}',
				],
				'keywords'    => [
					'en' => '{page.keywords}',
					'fr' => '{page.keywords}',
				],
				'active'      => '1',
			],
		];
		
		$tableName = (new MetaTag())->getTable();
		foreach ($entries as $entry) {
			$entry = arrayTranslationsToJson($entry);
			$entryId = DB::table($tableName)->insertGetId($entry);
		}
	}
}
