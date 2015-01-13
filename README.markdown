## About

I buil this tool to help people to accurately answer (by not having to actually answer) the question of "what browser are you using?" when writing to me with a support request or a bug report.

After filling out a form with just a single field for their name, the script emails their User Agent, IP Address, and (if JavaScript is enabled) the results of their Modernizr tests.

## Requirements

PHP 5 and a Mandrill API key with the [Mandrill PHP API Client](https://mandrillapp.com/api/docs/index.php.html) installed in /mandrill.

## Modernizr

This repository includes a build of Modernizr with the tests I like to have access to. You can build your own on the [Modernizr download page](http://modernizr.com/download/).

## License

This tool is released under the [GNU GPL v3.0](https://gnu.org/licenses/old-licenses/gpl-2.0.txt).