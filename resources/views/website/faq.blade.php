@extends('website.layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
@section('title', 'FAQs Page')

@section('content')
<div style="height: 70px; background-color: #0b0b0b"></div>
<h1>FAQs</h1>

<div class="wrapper">

    <div class="faq container">
        <div class="question">
            How do I verify my email?
        </div>
        <div class="answercont">
            <div class="answer">
                Click the link in the verification email from verify@codepen.io (be sure to check your spam folder or other email tabs if it's not in your inbox).

                Or, send an email with the subject "Verify" to verify@codepen.io from the email address you use for your CodePen account.<br><br>

                <a href="https://blog.codepen.io/documentation/features/email-verification/#how-do-i-verify-my-email-2">How to Verify Email Docs</a>
            </div>
        </div>
    </div>

    <div class="faq container">
        <div class="question">
            My Pen loads infinitely or crashes the browser.
        </div>
        <div class="answercont">
            <div class="answer">
                It's likely an infinite loop in JavaScript that we could not catch. To fix, add ?turn_off_js=true to the end of the URL (on any page, like the Pen or Project editor, your Profile page, or the Dashboard) to temporarily turn off JavaScript. When you're ready to run the JavaScript again, remove ?turn_off_js=true and refresh the page.<br><br>

                <a href="https://blog.codepen.io/documentation/features/turn-off-javascript-in-previews/">How to Disable JavaScript Docs</a>
            </div>
        </div>
    </div>

    <div class="faq container">
        <div class="question">
            How do I contact the creator of a Pen?
        </div>
        <div class="answercont">
            <div class="answer">
                You can leave a comment on any public Pen. Click the "Comments" link in the Pen editor view, or visit the Details page.<br><br>

                <a href="https://blog.codepen.io/documentation/faq/how-do-i-contact-the-creator-of-a-pen/">How to Contact Creator of a Pen Docs</a>
            </div>
        </div>
    </div>

    <div class="faq container">
        <div class="question">
            What version of [library] does CodePen use?
        </div>
        <div class="answercont">
            <div class="answer">
                We have our current list of library versions <a href="https://codepen.io/versions">here</a>

            </div>
        </div>
    </div>

    <div class="faq container">
        <div class="question">
            What are forks?
        </div>
        <div class="answercont">
            <div class="answer">
                A fork is a complete copy of a Pen or Project that you can save to your own account and modify. Your forked copy comes with everything the original author wrote, including all of the code and any dependencies.<br><br>

                <a href="https://blog.codepen.io/documentation/features/forks/">Learn More About Forks</a>
            </div>
        </div>
    </div>

</div>


<!-- overlay widget js -->
<script src="{{ asset('assets/vendor/overlay-widget/js/overlay-widget.js') }}"></script>
<script>
    kofiWidgetOverlay.draw('mohamedghulam', {
        'type': 'floating-chat',
        'floating-chat.donateButton.text': 'Support me',
        'floating-chat.donateButton.background-color': '#323842',
        'floating-chat.donateButton.text-color': '#fff'
    });
</script>
@endsection
