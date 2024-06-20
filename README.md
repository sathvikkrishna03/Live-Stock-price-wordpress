         Live_stock_price_Plugin
Description
    The Live_stock_price_Plugin fetches live stock price data from an API and stores it in a dynamic shortcode. This shortcode can be used anywhere on your WordPress website to display the latest stock price.
Installation
    1.	Download the Plugin
        o	Clone the repository or download the plugin zip file from GitHub.
    2.	Upload the Plugin
        o	Go to your WordPress dashboard.
        o	Navigate to Plugins > Add New.
        o	Click on Upload Plugin and select the downloaded zip file.
        o	Click Install Now.
    3.	Activate the Plugin
        o	After installation, click on Activate Plugin to activate the plugin.
Usage
    1.	Add Shortcode to Page/Post
        o	Use the shortcode [dynamic_shortcode] in any page or post where you want to display the live stock price.
How It Works
    1.	Fetching Data
        o	The plugin fetches data from a specified API endpoint: https://sviksolution.com/test/angleone/POWERMECH.txt.
        o	The API response is cached for 30 seconds to reduce the number of API requests.
    2.	Shortcode Implementation
        o	The shortcode [dynamic_shortcode] is used to display the live stock price.
        o	When the shortcode is used, it checks if the cached data is available. If not, it fetches new data from the API and updates the cache.
Files
    •	live_stock_price_plugin.php
        o	Main plugin file containing all the necessary code for fetching data, caching, and displaying the shortcode.
Functions
    •	dynamic_shortcode_callback($atts)
        o	Callback function for the shortcode. Checks if cached data is available and fetches new data if necessary. Returns the stock price.
    •	get_dynamic_data()
        o	Fetches data from the API and decodes the JSON response to retrieve the stock price.
    •	update_shortcode_on_page_load()
        o	Adds a filter to modify the shortcode output if necessary.
    •	modify_shortcode_output($output, $tag, $attr, $m)
        o	Function to modify the output of the shortcode. Currently, it simply returns the existing output.
Filters & Hooks
    •	add_shortcode('dynamic_shortcode', 'dynamic_shortcode_callback')
        o	Registers the [dynamic_shortcode] shortcode with the dynamic_shortcode_callback function.
    •	add_action('init', 'update_shortcode_on_page_load')
        o	Hooks the update_shortcode_on_page_load function to the init action to set up the filter for modifying shortcode output.
    •	add_filter('do_shortcode_tag', 'modify_shortcode_output', 10, 4)
        o	Adds a filter to modify the output of the shortcode.
License
This plugin is open-source and licensed under the MIT License. Feel free to modify and distribute it as needed.
Contributing
    1.	Fork the repository.
    2.	Create a new branch (git checkout -b feature-branch).
    3.	Make your changes.
    4.	Commit your changes (git commit -am 'Add new feature').
    5.	Push to the branch (git push origin feature-branch).
    6.	Create a new Pull Request.
Changelog
    •	v1.0
        o	Initial release.
Support
If you have any questions or need support, please open an issue in the GitHub repository.
_____________________________________________________________________________________________________________________________
Thank you for using Live_stock_price_Plugin! We hope it helps you display live stock prices seamlessly on your WordPress site.

