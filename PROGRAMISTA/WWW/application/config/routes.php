<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "strona_startowa";
$route['newsy/strona/(:any)'] = "newsy/strona/$1";
$route['newsy/pokaz_news/(:any)'] = "newsy/pokaz_news/$1";

$route['example/authenication/(:any)'] = 'example/authenication/$1';
$route['example/authenication_error'] = 'example/authenication_error';

$route['panel_admina/rzeczy'] = 'panel_admina/rzeczy';
$route['panel_admina/dodaj_rzecz'] = 'panel_admina/dodaj_rzecz';
$route['panel_admina/usun_rzecz/(:any)'] = 'panel_admina/usun_rzecz/$1';
$route['panel_admina/edytuj_rzecz/(:any)'] = 'panel_admina/edytuj_rzecz/$1';
$route['panel_admina/kategorie'] = 'panel_admina/kategorie';
$route['panel_admina/dodaj_kategorie'] = 'panel_admina/dodaj_kategorie';
$route['panel_admina/usun_kategorie/(:any)'] = 'panel_admina/usun_kategorie/$1';
$route['panel_admina/edytuj_kategorie/(:any)'] = 'panel_admina/edytuj_kategorie/$1';
$route['panel_admina/newsy'] = 'panel_admina/newsy';
$route['panel_admina/dodaj_newsy'] = 'panel_admina/dodaj_newsy';
$route['panel_admina/usun_newsy/(:any)'] = 'panel_admina/usun_newsy/$1';
$route['panel_admina/edytuj_newsy/(:any)'] = 'panel_admina/edytuj_newsy/$1';
$route['panel_admina/authenication_error'] = 'panel_admina/authenication_error';

$route['rejestracja'] = 'relog/rejestracja';
$route['logowanie'] = 'relog/logowanie';
$route['wylogowanie'] = 'relog/wylogowanie';

$route['zagraj'] = 'gra';

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */