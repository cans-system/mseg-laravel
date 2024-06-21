<!DOCTYPE html>
<html lang="ja">
<x-admin.head />
<body>
  <x-admin.header />
  <main>
    {{ $slot }}
  </main>
  <x-admin.footer />
  <x-admin.toast />
</body>
</html>