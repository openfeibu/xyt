HTML To Markdown for PHP
========================

[![Join the chat at https://gitter.im/thephpleague/html-to-markdown](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/thephpleague/html-to-markdown?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

[![Latest Version](https://img.shields.io/packagist/v/league/html-to-markdown.svg?style=flat-square)](https://packagist.org/packages/league/html-to-markdown)
[![Software License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/thephpleague/html-to-markdown/master.svg?style=flat-square)](https://travis-ci.org/thephpleague/html-to-markdown)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/thephpleague/html-to-markdown.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/html-to-markdown/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/thephpleague/html-to-markdown.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/html-to-markdown)
[![Total Downloads](https://img.shields.io/packagist/dt/league/html-to-markdown.svg?style=flat-square)](https://packagist.org/packages/league/html-to-markdown)

Library which converts HTML to [Markdown](http://daringfireball.net/projects/markdown/) for your sanity and convenience.


**Requires**: PHP 5.3+

**Lead Developer**: [@colinodell](http://twitter.com/colinodell)

**Original Author**: [@nickcernis](http://twitter.com/nickcernis)


### Why convert HTML to Markdown?

*"What alchemy is this?"* you mutter. *"I can see why you'd convert [Markdown to HTML](https://github.com/thephpleague/commonmark),"* you continue, already labouring the question somewhat, *"but why go the other way?"*

Typically you would convert HTML to Markdown if:

1. You have an existing HTML document that needs to be edited by people with good taste.
2. You want to store new content in HTML format but edit it as Markdown.
3. You want to convert HTML email to plain text email. 
4. You know a guy who's been converting HTML to Markdown for years, and now he can speak Elvish. You'd quite like to be able to speak Elvish.
5. You just really like Markdown.

### How to use it

Require the library by issuing this command:

```bash
composer require league/html-to-markdown
```

Add `require 'vendor/autoload.php';` to the top of your script.

Next, create a new HtmlConverter instance, passing in your valid HTML code to its `convert()` function:

    use League\HTMLToMarkdown\HtmlConverter;

    $converter = new HtmlConverter();

    $html = "<h3>Quick, to the Batpoles!</h3>";
    $markdown = $converter->convert($html);

The `$markdown` variable now contains the Markdown version of your HTML as a string:

    echo $markdown; // ==> ### Quick, to the Batpoles!

The included `demo` directory contains an HTML->Markdown conversion form to try out.

### Conversion options

By default, HTML To Markdown preserves HTML tags without Markdown equivalents, like `<span>` and `<div>`.

To strip HTML tags that don't have a Markdown equivalent while preserving the content inside them, set `strip_tags` to true, like this:

    $converter = new HtmlConverter(array('strip_tags' => true));

    $html = '<span>Turnips!</span>';
    $markdown = $converter->convert($html); // $markdown now contains "Turnips!"

Or more explicitly, like this:

    $converter = new HtmlConverter();
    $converter->getConfig()->setOption('strip_tags', true);

    $html = '<span>Turnips!</span>';
    $markdown = $converter->convert($html); // $markdown now contains "Turnips!"

Note that only the tags themselves are stripped, not the content they hold.

To strip tags and their content, pass a space-separated list of tags in `remove_nodes`, like this:

    $converter = new HtmlConverter(array('remove_nodes' => 'span div'));

    $html = '<span>Turnips!</span><div>Monkeys!</div>';
    $markdown = $converter->convert($html); // $markdown now contains ""

### Style options

Bold and italic tags are converted using the asterisk syntax by default. Change this to the underlined syntax using the `bold_style` and `italic_style` options.

    $converter = new HtmlConverter();
    $converter->getConfig()->setOption('italic_style', '_');
    $converter->getConfig()->setOption('bold_style', '__');

    $html = '<em>Italic</em> and a <strong>bold</strong>';
    $markdown = $converter->convert($html); // $markdown now contains "_Italic_ and a __bold__"

### Limitations

- Markdown Extra, MultiMarkdown and other variants aren't supported ??? just Markdown.

### Known issues

- Nested lists and lists containing multiple paragraphs aren't converted correctly.
- Lists inside blockquotes aren't converted correctly.
- Any reported [open issues here](https://github.com/thephpleague/html-to-markdown/issues?state=open).

[Report your issue or request a feature here.](https://github.com/thephpleague/html-to-markdown/issues/new) Issues with patches or failing tests are especially welcome.

### Style notes

- Setext (underlined) headers are the default for H1 and H2. If you prefer the ATX style for H1 and H2 (# Header 1 and ## Header 2), set `header_style` to 'atx' in the options array when you instantiate the object:

    `$converter = new HtmlConverter(array('header_style'=>'atx'));`

     Headers of H3 priority and lower always use atx style.

- Links and images are referenced inline. Footnote references (where image src and anchor href attributes are listed in the footnotes) are not used. 
- Blockquotes aren't line wrapped ??? it makes the converted Markdown easier to edit.

### Dependencies

HTML To Markdown requires PHP's [xml](http://www.php.net/manual/en/xml.installation.php), [lib-xml](http://www.php.net/manual/en/libxml.installation.php), and [dom](http://www.php.net/manual/en/dom.installation.php) extensions, all of which are enabled by default on most distributions.

Errors such as "Fatal error: Class 'DOMDocument' not found" on distributions such as CentOS that disable PHP's xml extension can be resolved by installing php-xml.

### Contributors

Many thanks to all [contributors](https://github.com/thephpleague/html-to-markdown/graphs/contributors) so far. Further improvements and feature suggestions are very welcome.

### How it works

HTML To Markdown creates a DOMDocument from the supplied HTML, walks through the tree, and converts each node to a text node containing the equivalent markdown, starting from the most deeply nested node and working inwards towards the root node.

### To-do

- Support for nested lists and lists inside blockquotes.
- Offer an option to preserve tags as HTML if they contain attributes that can't be represented with Markdown (e.g. `style`).

### Trying to convert Markdown to HTML?

Use one of these great libraries:

 - [league/commonmark](https://github.com/thephpleague/commonmark) (recommended)
 - [cebe/markdown](https://github.com/cebe/markdown)
 - [PHP Markdown](https://michelf.ca/projects/php-markdown/)
 - [Parsedown](https://github.com/erusev/parsedown)

No guarantees about the Elvish, though.

