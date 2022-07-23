if (document.querySelector( '#editor' )) {
  ClassicEditor
    .create( document.querySelector( '#editor' ), {
      toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'mediaEmbed', 'undo', 'redo', 'list' ],
      heading: {
        options: [
          { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
          { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
          { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
        ]
      }
    } )
    .catch( error => {
      console.log( error );
    } );
}

let commentSuccess = document.querySelector('.comments .success');

if (commentSuccess) {
  setTimeout(() => {
    commentSuccess.classList.add('none');
  }, 6000);
}