@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <i class="fas fa-bell mr-2"></i>
                <h4 class="card-title mb-0">Notifications</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-emails-tab" data-toggle="pill" href="{{ route('emails.notification.index') }}"
                            role="tab" aria-controls="pills-emails" aria-selected="true">
                            <i class="fas fa-envelope"></i> Emails
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-sms-tab" data-toggle="pill" href="#pills-sms" role="tab"
                            aria-controls="pills-sms" aria-selected="false">
                            <i class="fas fa-sms"></i> SMS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-push-tab" data-toggle="pill" href="#pills-push" role="tab"
                            aria-controls="pills-push" aria-selected="false">
                            <i class="fas fa-bell"></i> Push Notifications
                        </a>
                    </li>

                    {{-- whatsapp notification --}}
                    <li class="nav-item">
                        <a class="nav-link" id="pills-whatsapp-tab" data-toggle="pill" href="#pills-whatsapp" role="tab"
                            aria-controls="pills-whatsapp" aria-selected="false">
                            <i class="fab fa-whatsapp"></i> Whatsapp Notifications
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-emails" role="tabpanel"
                        aria-labelledby="pills-emails-tab">
                        <h5><i class="fas fa-envelope-open-text"></i> Emails</h5>
                        <p>Emails are sent to the users who have subscribed to the newsletter.</p>
                    </div>
                    <div class="tab-pane fade" id="pills-sms" role="tabpanel" aria-labelledby="pills-sms-tab">
                        <h5><i class="fas fa-sms"></i> SMS</h5>
                        <p>SMS are sent to the users who have subscribed to the newsletter.</p>
                    </div>
                    <div class="tab-pane fade" id="pills-push" role="tabpanel" aria-labelledby="pills-push-tab">
                        <h5><i class="fas fa-bell"></i> Push Notifications</h5>
                        <p>Push notifications are sent to the users who have subscribed to the newsletter.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
