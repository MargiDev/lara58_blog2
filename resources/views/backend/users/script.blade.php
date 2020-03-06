@section('script')

  <script type="text/javascript">

    $('#name').on('blur', function(){
      var theName = this.value.toLowerCase().trim(),
          slugInput = $('#slug'),
          theSlug = theName.replace(/&/g, '-and-') // replace & with -and-
                            .replace(/[^a-z0-9-]+/g, '-') // replace empty space with -
                            .replace(/\-\-+/g, '-') // replace more than one - or + with only one -
                            .replace(/^-+|-+$/g, ''); // + or - on the left and right should be remove replace with empty space



      slugInput.val(theSlug);
    });

  </script>

@endsection
