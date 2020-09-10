/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for two toolbar rows.

	CKEDITOR.on("instanceReady", function(event) {
		event.editor.on("beforeCommandExec", function(event) {
			// Show the paste dialog for the paste buttons and right-click paste
			if (event.data.name == "paste") {
				event.editor._.forcePasteDialog = true;
			}
			// Don't show the paste dialog for Ctrl+Shift+V
			if (event.data.name == "pastetext" && event.data.commandData.from == "keystrokeHandler") {
				event.cancel();
			}
		})
	});
	config.toolbarGroups = [
		'/',
		'/',
		'/',
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'about', groups: [ 'about' ] },
		'/',
		'/',
		'/',
	];

	

	config.extraPlugins = 'font';
	
	config.extraPlugins = 'justify';

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Link,Anchor,Unlink,Image,SpecialChar,Maximize,Source,About,Styles,Format';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.defaultLanguage = 'es';
	
};


