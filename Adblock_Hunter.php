<?php
	/*
	 * Plugin Name: Adblock Hunter by BangRoyHan
	 * Plugin URI: http://bangroyhan.cf/
	 * Description: Buang adblock, karena AdBlock dibenci para blogger dan webmaster :D. Kecuali saya :v :v.
	 * Version: 1.8
	 * Author: Bang Roy Han
	 * Author URI: http://bangroyhan.cf/
	 * Copyright 2015 B.R.H
	 */
	 
	function pengaturan() {
		return array(
			'enabled' => get_option('aktifGa'),
			'judul' => trim(get_option('judule')),
			'katakata' => trim(get_option('katakatanya')),
			'gambar' => trim(get_option('gambare')),
			'amankan' => trim(get_option('aminkan'))
		);
	}
	
	function mulaiBRH() {
		if (get_option('aktifGa')) {
			$opsi = pengaturan();
			echo "
<style type=\"text/css\">.begron{z-index:99999999;margin:0px auto;width:100%;top:0px;bottom:0px;background-color:rgba(50, 191, 0, 0.898);background: -moz-linear-gradient(top,  rgba(50, 191, 0, 0.898) 0%, rgba(130, 214, 100, 0.898) 56%, rgba(255, 255, 255, 0.898) 99%) no-repeat;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(50, 191, 0, 0.898)), color-stop(56%,rgba(130, 214, 100, 0.898)), color-stop(99%,rgba(255, 255, 255, 0.898))) no-repeat;background: -webkit-linear-gradient(top,  rgba(50, 191, 0, 0.898) 0%,rgba(130, 214, 100, 0.898) 56%,rgba(255, 255, 255, 0.898) 99%) no-repeat;background: -o-linear-gradient(top,  rgba(50, 191, 0, 0.898) 0%,rgba(130, 214, 100, 0.898) 56%,rgba(255, 255, 255, 0.898) 99%) no-repeat;background: -ms-linear-gradient(top,  rgba(50, 191, 0, 0.898) 0%,rgba(130, 214, 100, 0.898) 56%,rgba(255, 255, 255, 0.898) 99%) no-repeat;background: linear-gradient(to bottom,  rgba(50, 191, 0, 0.898) 0%,rgba(130, 214, 100, 0.898) 56%,rgba(255, 255, 255, 0.898) 99%) no-repeat;filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=#db3c4c, endColorstr=#a22c38,GradientType=0 ) no-repeat;color:#000000;position:fixed;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-o-user-select: none;user-select: none;text-align:center;cursor: default;}.heding{padding:15px 0px 0px 0px;font-size:27px;color:red;line-height: 9px;margin: 5px;text-transform: uppercase;text-shadow: 4px 2px 1px #000000;}.punyaane{margin:0 auto;font-size:10px;background:#000;border-radius:10px;color:#fff;border:2px solid red;padding:5px;width:80%;}.keretangan{margin-top:5px;font-size: 18px;color:#000000;}.gbrnyong{box-shadow: 8px 9px 5px #000000;}</style>
<script type=\"text/javascript\" src=\"" . plugins_url('/advertisement.js', __FILE__ )."\"></script>
<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.9.0.min.js\"></script>
<script type=\"text/javascript\">
if (document.getElementById(\"tester\") == undefined || document.getElementById(\"adsense\") == undefined || document.getElementById(\"ad-container\") == undefined)
{
" . ($opsi['amankan'] ? "
document.oncontextmenu = function() {
    return false;
}
 document.onkeydown = function(e) {
 if (e.ctrlKey && 
 (e.keyCode === 67 || 
 e.keyCode === 86 || 
 e.keyCode === 85 || 
 e.keyCode === 117)) {
 return false;
 } else {
 return true;
 }
};": "") . "
$(document).keypress(\"u\",function(e) { if(e.ctrlKey) {return false;}else{return true;}});
document.write('<div class=\"begron\"><h6 class=\"heding\">" . json_encode($opsi['judul']) . "</h6><p class=\"keretangan\">" . json_encode($opsi['katakata']) . "</p><p class=\"keretangan\">Cara non-aktifkan AdBlock seperti gambar dibawah ini.</p><br><img src=" . str_replace('\\','',json_encode($opsi['gambar'])) . " alt=\"AdBlock Hunter\" title=\"AdBlock Hunter\" class=\"gbrnyong\"><p class=\"keretangan\">Setelah dimatikan, silahkan refresh halaman ini.</p><p class=\"punyaane\">Plugin Wordpress AdBlock Hunter by <a href=\"http://bangroyhan.pasti.in/\" target=\"_blank\" style=\"color:#fff;\" title=\"Bang Roy Han\">Bang Roy Han</a>.</p></div>');
}
</script>";
		} else {
			return false;
		}
	}
	
	function buatAdmin() {
		add_options_page('AdBlock Hunter', 'AdBlock Hunter', 'administrator', __FILE__, 'IniHalAdmin', plugins_url('/brh.png', __FILE__ ));
		add_action('admin_init', 'bangroyhanRegisterSetting');
	}
	function bangroyhanRegisterSetting() {
		register_setting('bangroyhan-adblock-hunter', 'aktifGa');
		register_setting('bangroyhan-adblock-hunter', 'judule');
		register_setting('bangroyhan-adblock-hunter', 'katakatanya');
		register_setting('bangroyhan-adblock-hunter', 'gambare');
		register_setting('bangroyhan-adblock-hunter', 'aminkan');
	}
	function IniHalAdmin() {?>
		<div class="wrap">
			<h2>Adblock Hunter</h2>
			<img src="<?php echo plugins_url('/brh.png', __FILE__ ); ?>" alt="" title="AdBlock Hunter" style="float: left;padding: 5px;"><p>Masukkan pengaturan adblock hunter disini. Dan jangan lupa kunjungi Blog Bang Roy Han, kali aja ada update terbaru.</p>
			<form method="post" action="options.php">
		    	<?php settings_fields('bangroyhan-adblock-hunter');?>
		    	<table class="form-table">
		    		<tbody>
						<tr valign="top">
							<td scope="row">Aktifkan Plugin</td>
							<td><input type="checkbox" <?php echo get_option('aktifGa') ? 'checked="checked"' : '' ?> value="1" name="aktifGa" /></td>
						</tr>
						<tr valign="top">
							<td scope="row">Amankan</td>
							<td><input type="checkbox" <?php echo get_option('aminkan') ? 'checked="checked"' : '' ?> value="1" name="aminkan" />
								<p class="description">
									Disable klik kanan, disable tombol kombinasi seperti CTRL+U / CTRL+A / dll.
								</p></td>
						</tr>
						<tr valign="top">
							<td scope="row">Judul</td>
							<td>
								<input type="text" name="judule" value="<?php echo get_option('judule') ?>" placeholder="PERINGATAN.!!!" />
								<p class="description">
									Maksudnya, judul pada peringatan yang muncul.
								</p>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row">Kata-Kata</td>
							<td>
								<div>
									<textarea rows="4" style="width: 64%;" name="katakatanya" placeholder="Masukkan keterangan disini"><?php echo htmlspecialchars(trim(get_option('katakatanya')), ENT_QUOTES) ?></textarea>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row">Lokasi Gambar</td>
							<td>
								<input type="text" name="gambare" placeholder="Lokasi gambar" value="<?php echo get_option('gambare') ?>" />
								<p class="description">
									Lokasi gambar yang akan ditampilkan pada popup. Contoh : http://bangroyhan.cf/wp-content/uploads/2015/01/adblok1.jpg
								</p>
							</td>
						</tr>
					</tbody>
				</table>
		
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Update Settings') ?>" />
				</p>
				
				<p>Hubungi ane kalo ada yang rusak, atau pengen tanya-tanya. <a href="http://bangroyhan.pasti.in/" target="_blank">Bang Roy Han</a>.</p>
			</form>
		</div>
<?php }?>
<?php
	add_action('wp_head', 'mulaiBRH');
	add_action('admin_menu', 'buatAdmin');
?>
