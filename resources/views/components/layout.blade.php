@props(['title'])

<!DOCTYPE html>
<html lang="ja">
<x-head title="{{ $title }}" />
<body>
  <x-header />
  <main>
    {{ $slot }}
  </main>
  <x-footer />
</body>
</html>