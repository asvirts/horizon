<div class="container">
    <h1>{{ $title }}</h1>
    <button onclick="handleClick()">{{ $buttonText }}</button>
</div>

@push('scripts')
<script>
    function handleClick() {
        // ... convert Vue method to regular JavaScript
    }
</script>
@endpush 