@if (session()->has('success'))
<!-- Use alpine js to remove the banner after 3 sec -->
<div
    x-data="{show: true}"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    class="fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
>
    <p>{{ session()->get('success') }}</p>
</div>
@endif
