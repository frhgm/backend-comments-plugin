<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Section</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/htmx/1.9.9/htmx.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        darkbg: '#181818',
                        darksurface: '#2f2f2f',
                        darkcomment: '#333333',
                        accent: '#ff4500',
                        button: '#184a99'
                    }
                }
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
             htmx.config.includeIndicatorStyles = false; // Disable HTMX default indicator

        })
    </script>
</head>
<body class="bg-darkbg text-gray-200 min-h-screen flex justify-center items-center p-4 font-mono">
    <main class="container relative w-4/5 max-w-3xl bg-darksurface rounded-lg shadow-lg p-5" >
        <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-400" aria-label="Settings">
            <i class="fas fa-gear text-xl"></i>
        </button>

        <h1 class="text-center text-accent text-2xl font-bold mb-4">Write a Comment</h1>

      <form id="commentForm" hx-post="/comments" hx-target="#commentsList" hx-swap="afterbegin" class="mb-6" hx-indicator="#loading">
            <textarea id="commentInput" name="content" placeholder="Write a comment..." required
                class="w-full bg-darkcomment border border-gray-600 rounded-lg p-3 mb-3 text-gray-200 focus:outline-none focus:border-blue-500"></textarea>

            <div class="flex gap-3">
                <button type="submit" class="bg-button hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                    Comment
                </button>
                <button type="button" hx-on:click="htmx.find('#commentInput').value = ''"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md">
                    Cancel
                </button>
            </div>
            <div id="loading" class="htmx-indicator">
                Loading...
            </div>
        </form>

        <section>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Comments</h2>
                <div class="flex items-center gap-2">
                    <span>Sort by:</span>
					<select id="sortOptions" class="bg-gray-700 text-white rounded px-2 py-1 border-0"
						hx-get="/comments" hx-trigger="change" hx-target="#commentsList" hx-include="#sortOptions" hx-indicator="#loading">
						<option value="new">New</option>
						<option value="top">Top Rated</option>
						<option value="trending">Trending</option>
					</select>

                </div>
            </div>

            <ul id="commentsList" class="space-y-4" hx-get="/comments" hx-trigger="load" hx-indicator="#loading">
                <div id="loading" class="htmx-indicator">
                    Loading...
                 </div>
            </ul>
        </section>
    </main>


</body>
</html>