<?PHP
/* 
	File for internal admin / info page
*/

add_action('admin_menu', 'rp_admin_page');

function rp_admin_page(){
        add_menu_page( 'Random Picture', 'Random Picture', 'manage_options', 'Random-Picture', 'rp_admin_page_html' );
}

//Output admin/info Page
function rp_admin_page_html(){
        echo "<h1>Random-Picture / Zufallsbild</h1>";
		
		echo "<h2>Widget</h2>";
		
		echo "<p>EN: The widget you can configurate in de Design => Widgets Menü. Set 'title' and 'Theme-ID'</p>";
		echo "<p>DE: Das Widget können Sie im Menü Design => Widgets konfigurieren. Es kann ein 'Titel' und eine 'Theme-ID' definiert werden.</p>";
		
		echo "<h2>Shortcode</h2>";
		
		echo "<p>EN: Add this shortcode '[RandomPicture Theme-ID=1]' to posts and pages.</p>";
		echo "<p>DE: Fügen Sie folgenden Shortcode '[RandomPicture Theme-ID=1] zu Beiträgen oder Seiten hinzu.'</p>";
				
}
?>