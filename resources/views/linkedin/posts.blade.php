<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn Posts</title>
</head>
<body>
    <h1>Your LinkedIn Posts</h1>
    @if(!empty($posts))
        <ul>
            @foreach($posts as $post)
                <li>
                    <p><strong>Text:</strong> {{ $post['specificContent']['com.linkedin.ugc.ShareContent']['shareCommentary']['text'] }}</p>
                    <p><strong>Visibility:</strong> {{ $post['visibility']['com.linkedin.ugc.MemberNetworkVisibility'] }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No posts found.</p>
    @endif
</body>
</html>
