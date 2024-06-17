/** 
 * File: admin/controller/todoScript.js
 * Author: Yash Balotiya
 * Description: // TODO
 * Created on: 03 June 2024
 * Last Modified: 04 June 2024
*/

// This is the script for the advanced text editor on the todo page
tinymce.init({
    selector: 'textarea#default',
    width: 1100,
    height: 450,
    license_key: 'gpl',
    plugins:[
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
        'table', 'emoticons', 'template', 'codesample'
    ],
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons',
    menu: {
        favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table',
    content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
});