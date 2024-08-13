<div>
    @if (session()->has('notification'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const notification = @json(session('notification.event'));
                window.dispatchEvent(new CustomEvent('notify::show', {
                    detail: [notification]
                }));
            });
        </script>
    @endif
</div>