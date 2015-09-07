/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.toolbar_Basic =
        [
             [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ],
             [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
             '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
             [ 'Link','Unlink','Anchor' ] ,
             [ 'Image','Table','HorizontalRule' ],
            [ 'Styles','Format','Font','FontSize' ] ,
            [ 'TextColor','BGColor' ],
            [ 'ShowBlocks' ],
            [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ]
        ];
    config.toolbar_Full =
        [
            ['Source','DocProps','-','Save','NewPage','Preview','Templates'],
            [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
            [ 'Bold','Italic','Underline','Strike', 'Subscript', 'Superscript' ],
            [ 'list', 'indent', 'blocks', 'align', 'bidi' ],
            [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
                '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
            ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
            [ 'Link','Unlink','Anchor' ] ,
            [ 'Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
            [ 'Styles','Format','Font','FontSize' ] ,
            [ 'TextColor','BGColor' ],
            [ 'FitWindow','ShowBlocks' ]
        ];
    config.toolbar_simple =[];
};

