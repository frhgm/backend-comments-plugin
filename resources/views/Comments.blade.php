<form method="POST" action="{{ url('/add-comment') }}">
    @csrf  <!-- This generates a CSRF token -->
    <textarea name="content" placeholder="Write your comment..."></textarea>
    <button type="submit">Submit</button>
</form>
