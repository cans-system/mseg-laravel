@if (session('toast') !== null)
  <script>
    toastr.options.positionClass = 'toast-bottom-right';
    toastr
    ['{{ session('toast')[0] }}']
    ('{{ session('toast')[1] }}');
  </script>
@endif
