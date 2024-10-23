<?php
/**
 * test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function test_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on test, use a find and replace
		* to change 'test' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'test', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'test' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'test_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'test_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_scripts() {
	wp_enqueue_style( 'test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'test-style', 'rtl', 'replace' );

	wp_enqueue_script( 'test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function enqueue_bootstrap() {
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

function enqueue_fontawesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_fontawesome');


function display_multistep_form() {
    ob_start();
    ?>

	<div class="container mt-5">
        <div class="card" style="background-color: #e5e5e5;"> <!-- ѳ��� ��� ��� �񳺿 ����� -->
            <div class="card-body">
                <!-- Breadcrumb Navigation (Header) -->
                <div class="breadcrumb-container mb-4" style="background-color: #ffffff; padding: 10px; border-radius: 5px;"> <!-- ���������� ���� � ���� ����� -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0" style="background-color: transparent; margin-bottom: 0;"> <!-- �������� ������ -->
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page" id="step1-breadcrumb">Contact Info</li>
                            <li class="breadcrumb-item" id="step2-breadcrumb">Quantity</li>
                            <li class="breadcrumb-item" id="step3-breadcrumb">Price</li>
                            <li class="breadcrumb-item" id="step4-breadcrumb">Done</li>
                        </ol>
                    </nav>
                </div>

                <!-- Form Body -->
                <form id="multistep-form" method="POST" action="">
                    <!-- Step 1 -->
                    <div id="step1">
                        <h3 class="mb-4">Contact Info</h3>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                        </div>
                        <button type="button" class="btn btn-primary w-45" onclick="showNextStep(2)">Next</button>
                    </div>
                    
                    <!-- Step 2: Quantity -->
                    <div id="step2" style="display:none;">
                        <h3 class="mb-4">Quantity</h3>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity (max 1000)</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" min="1" max="1000" required>
                            <div id="quantity-error" class="text-danger mt-2" style="display:none;">Please enter a valid quantity between 1 and 1000.</div>
                        </div>
                        <button type="button" class="btn btn-secondary w-40" onclick="showNextStep(1)">Back</button>
                        <button type="button" class="btn btn-primary w-40" onclick="validateQuantity()">Continue</button>
                    </div>

                    <!-- Step 3: Price -->
                    <div id="step3" style="display:none;">
                        <h3 class="mb-4">Price</h3>
                        <p>The total price based on the quantity is: <strong id="price-display">$0</strong></p>
                        <button type="button" class="btn btn-secondary w-40" onclick="showNextStep(2)">Back</button>
                        <button type="submit" name="submit_form" class="btn btn-success w-40" onclick="showNextStep(4)">Send</button>
                    </div>

                    <!-- Step 4: Done -->
                    <div id="step4" style="display:none;">
                        <h3 class="mb-4">Done</h3>
                        <p>Thank you! Your form is complete.</p>
			<button type="button" class="btn btn-secondary w-40" onclick="showNextStep(1)">Start again</button>
                    </div>

                    <!-- Hidden field for form submission check -->
                    <input type="hidden" id="form-submitted" value="<?php echo isset($_POST['form_submitted']) ? 'true' : 'false'; ?>">
                </form>
            </div>
        </div>
    </div>

	
    <script>
        function showNextStep(step) {
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'none';
            document.getElementById('step3').style.display = 'none';
            document.getElementById('step4').style.display = 'none';
            
            document.getElementById('step' + step).style.display = 'block';
            
            for (let i = 1; i <= 4; i++) {
                document.getElementById('step' + i + '-breadcrumb').classList.remove('active');
            }
            document.getElementById('step' + step + '-breadcrumb').classList.add('active');
        }

        function validateQuantity() {
            const quantity = document.getElementById('quantity').value;
            const quantityError = document.getElementById('quantity-error');

            if (quantity < 1 || quantity > 1000) {
                quantityError.style.display = 'block';
            } else {
                quantityError.style.display = 'none';
                calculatePrice(quantity);
                showNextStep(3);
            }
        }

        function calculatePrice(quantity) {
            let price = 0;
            if (quantity >= 1 && quantity <= 10) {
                price = 10;
            } else if (quantity >= 11 && quantity <= 100) {
                price = 100;
            } else if (quantity >= 101 && quantity <= 1000) {
                price = 1000;
            }
            document.getElementById('price-display').innerHTML = '$' + price;
        }

        // Check if form has been submitted and navigate to the "Done" step
        document.addEventListener("DOMContentLoaded", function() {
            if (document.getElementById('form-submitted').value === 'true') {
                showNextStep(4);
            }
        });
    </script>
    <?php
    
    return ob_get_clean();
}
add_shortcode('multistep_form', 'display_multistep_form');

function handle_custom_form_submission() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_form'])) {
        // Отримання даних з форми
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $quantity = intval($_POST['quantity']);
        $price = 0; // наприклад, фіксована ціна

if ($quantity >= 1 && $quantity <= 10) {
        $price = 10;
    } elseif ($quantity >= 11 && $quantity <= 100) {
        $price = 100;
    } elseif ($quantity >= 101 && $quantity <= 1000) {
        $price = 1000;
    }
        
        // Формуємо повідомлення
        $to = $email; // на який email відправляти
        $subject = 'Нове замовлення від ' . $name;
        $message = "Ім'я: $name\n";
        $message .= "Email: $email\n";
        $message .= "Телефон: $phone\n";
        $message .= "Кількість: $quantity\n";
        $message .= "Ціна: $price\n";
        
        // Відправка email
        wp_mail($to, $subject, $message);
wp_redirect(add_query_arg('form_done', 'true'));
        exit;
    }
}
// Підключаємо функцію до хуку init
add_action('init', 'handle_custom_form_submission');

