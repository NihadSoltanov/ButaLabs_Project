@extends('layouts.frontend')

@section('title', 'Contact Us')

@section('content')
    <!-- Contact Section -->
    <section class="contact-section section">
        <div class="container">
            <h2>Contact Us</h2>
            <p class="text-center lead mb-5">We’re here to help you shape your digital future. Get in touch with us!</p>
            <div class="row">
                <!-- İletişim Bilgileri -->
                <div class="col-md-5 mb-4">
                    <div class="contact-info p-4">
                        <h3 class="fw-bold mb-4">Get in Touch</h3>
                        <p><i class="bi bi-geo-alt-fill me-3"></i>Baku, Azerbaijan</p>
                        <p><i class="bi bi-telephone-fill me-3"></i>+994 12 345 67 89</p>
                        <p><i class="bi bi-envelope-fill me-3"></i>info@youragency.com</p>
                        <p><i class="bi bi-clock-fill me-3"></i>Mon - Fri: 9:00 - 18:00</p>
                        <div class="mt-4">
                            <a href="#" class="me-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-linkedin-in fa-lg"></i></a>
                            <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                        </div>
                    </div>
                </div>
                <!-- İletişim Formu -->
                <div class="col-md-7">
                    <div class="contact-form p-4">
                        <h3 class="fw-bold mb-4">Send Us a Message</h3>
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
