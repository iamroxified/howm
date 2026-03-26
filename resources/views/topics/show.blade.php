<h1>Show Topic</h1>

<p><strong>ID:</strong> {{ $topic->id }}</p>
<p><strong>Topic:</strong> {{ $topic->topic }}</p>
<p><strong>Department:</strong> {{ $topic->department }}</p>
<p><strong>Level:</strong> {{ $topic->level }}</p>

<a href="{{ route('topics.index') }}">Back to list</a>
