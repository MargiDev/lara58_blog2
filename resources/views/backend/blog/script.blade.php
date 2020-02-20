@section('script')

  <script type="text/javascript">

    $('ul.pagination').addClass('no-margin pagination-sm');

    $('#title').on('blur', function(){
      var theTitle = this.value.toLowerCase().trim(),
          slugInput = $('#slug'),
          theSlug = theTitle.replace(/&/g, '-and-') // replace & with -and-
                            .replace(/[^a-z0-9-]+/g, '-') // replace empty space with -
                            .replace(/\-\-+/g, '-') // replace more than one - or + with only one -
                            .replace(/^-+|-+$/g, ''); // + or - on the left and right should be remove replace with empty space



      slugInput.val(theSlug);
    });

    var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
    var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

    $('#datetimepicker2').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',
      showClear: true
    });

    $('#draft-btn').click(function(e){
      e.preventDefault();
      $('#published_at').val("");
      $('#post-form').submit();
    });

  </script>

@endsection
