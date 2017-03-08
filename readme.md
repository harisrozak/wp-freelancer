# Workshop WordPress: Membuat Website Portofolio

##Bahan:
1. WordPress 4.7.X
2. Plugin: OptionTree
3. Plugin: Advanced Custom Fields
4. Plugin: Contact Form 7
5. HTML Template: Freelancer 
  - https://startbootstrap.com/template-overviews/freelancer/
  - https://github.com/BlackrockDigital/startbootstrap-freelancer

## Basic Steps:
1. Install WordPress beserta plugin yang dibutuhkan
2. Membuat dasar tema:
  - folder tema
  - style.css (https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/)
  - functions.php (https://developer.wordpress.org/themes/basics/theme-functions/)
  - index.php
  - screenshot.jpg (1200x900 atau 653x490)

3. Copy folder css, img, js, dan vendor dari template html ke folder theme
4. Include di functions.php file css dan js yang dibutuhkan (https://developer.wordpress.org/themes/basics/including-css-javascript/)
5. Mempelajari template hierarchy (https://developer.wordpress.org/themes/basics/template-hierarchy/)

## PHASE 1 : Target tampilan theme html sama dengan tampilan template html

- File header.php
  + copy - paste isi file index.html dari awal sampai tag `</nav>`
  + ganti tag `<title>` sampai teks tentang include css dan js di dalam tag `<head>` dengan `<?php wp_head(); ?>`
  + wp_head() berisi include file css dan js yang sudah kita buat tadi di functions.php
  + replace attribut class dalam `<body>` dengan `<?php body_class(); ?>` 

- File footer.php
  + copy - paste isi file index.html dari '<!-- Footer -->' sampai akhir file
  + hapus teks include file css dan js
  + pindah teks yang tidak perlu di footer.php ke bagian bawah front-page.php, dalam hal ini section `<!-- Portfolio Modals -->`
  + tambah teks sebelum `</body>` dengan `<?php wp_footer(); ?>`
  + wp_footer() berisi include file js yang tempatnya di footer, juga script navigasi WordPress

- style.css
  + css untuk membuat `.navbar-fixed-top` punya margin-top saat ada admin-bar

- File front-page.php
  + copy - paste isi file index.html dari template
  + ganti text dari pertama sampai tag `</header>` dengan `<?php get_header() ?>`
  + ganti teks dari '<!-- Footer -->' sampai akhir file dengan `<?php get_footer() ?>`
  + sesuaikan gambar yang missing sampai terlihat sama dengan template html, dengan related folder `<?php echo get_template_directory_uri() ?>/`  

- Periksa browser console (ctrl + shift + j), jika ada error `$` biasanya dia minta diganti dengan `jQuery`

# PHASE 2 : Inject engine

- Set header site title
  + title `<?php bloginfo( 'name' ); ?>`
  + url `<?php echo esc_url( home_url( '/' ) ); ?>#page-top`

- Set header menu (https://codex.wordpress.org/Navigation_Menus)
  + register menu on functions.php (https://codex.wordpress.org/Function_Reference/register_nav_menus)
  + display menu on header.php (https://developer.wordpress.org/reference/functions/wp_nav_menu/)
  + use conditional `has_nav_menu('menu-location')` to print `wp_nav_menu`
  + add class to <li> (https://codex.wordpress.org/Plugin_API/Filter_Reference/nav_menu_css_class)

- Set footer copyright text

- Set theme option dengan optiontree
  + main_picture
  + main_title
  + main_subtitle
  + portfolio_title
  + about_title
  + about_text_left
  + about_text_right
  + contact_title
  + footer_left_title
  + footer_left_text
  + footer_center_title
  + footer_center_facebook
  + footer_center_gplus
  + footer_center_linkedin
  + footer_center_wordpress
  + footer_center_github
  + footer_right_title
  + footer_right_text

- Apply theme option ke front-page.php `<?php echo ot_get_option( 'lorem_option' ); ?>`

- Membuat post type `portfolio` (https://github.com/harisrozak/wp-sample-custom-post-type)

- Membuat custom taxonomy: service

- Add theme support thumbnail (https://developer.wordpress.org/reference/functions/add_theme_support/)

- Add custom field with ACF: client, client_url, date

- Add query to show the portfolio (https://gist.github.com/harisrozak/1520974de004a48c515b)

- Email form with contact form 7
  + create the form with contact form 7 and ajust to the provided design
  + filter default template: `wpcf7_default_template`
  + show the first contact form 7 form, use WP_Query get first post type `wpcf7_contact_form` post_ID

# PHASE 3 : Finishing

- OptionTree theme mode
  + documentation: WP Admin > OptionTree > Documentation
  + copy the optiontree plugin to theme folder
  + put the code to make optiontree use theme mode
  + deactivate optiontree plugin and delete it from plugin folder
  + export the created options to php, Export -> Settings PHP File
  + copy the theme-options.php to theme then include it
  + disable optiontree bulder ui `add_filter( 'ot_show_pages', '__return_false' )`
  + optional: edit optiontree option header with yours `add_action('ot_header_list', 'your_fuction')`

- ACF theme mode
  + documentation: WP Admin > Export > Export to PHP
  + copy the acf plugin to theme folder
  + put the code to make acf use theme mode
  + export the field group to php, copy & include the code to theme
  + remove the field group from acf option builder, than disable & remove the plugin
  + hide the acf ui builder from admin `define( 'ACF_LITE', true );`

- Remove unused files that came with html template
  + porfolio images
  + contact_me.js
  + jqBootstrapValidation.js
  + don't forget to edit wp_enqueue section on functions.php because of removed js files

- Copy theme to other wordpress for full testing



