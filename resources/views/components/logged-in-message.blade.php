<div id="logged-in-message" class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function() {
            let messageElement = document.getElementById('logged-in-message');
            if (messageElement) {
                messageElement.style.transition = 'opacity 0.5s ease';
                messageElement.style.opacity = '0';
                setTimeout(function() {
                    messageElement.style.display = 'none';
                }, 500); // Correspond au temps de transition pour bien cacher l'élément
            }
        }, 2000); // 2 secondes avant de commencer la transition de disparition
    });
</script>