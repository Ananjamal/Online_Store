<div class="gray-bg">
    {{-- In work, do what you enjoy. --}}

    <!-- Start Content Page -->
    <div class="container-fluid py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Contact Us</h1>
            <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>
    <!-- End Content Page -->

    <!-- Start Contact Form -->
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">

            <form class="col-md-8" role="form">
                <div class="row mb-4">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @elseif (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="form-group col-md-6">
                        <label for="inputname" class="fw-bold">Your Name</label>
                        <input type="text" wire:model="name" class="form-control rounded-pill" id="name"
                            name="name" placeholder="Enter Your Name">
                        @error('name')
                            <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputemail" class="fw-bold">Your Email</label>
                        <input type="email" wire:model="email" class="form-control rounded-pill" id="email"
                            name="email" placeholder="Enter Your Email">
                        @error('email')
                            <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="inputsubject" class="fw-bold">Subject</label>
                    <input type="text" wire:model="subject" class="form-control rounded-pill" id="subject"
                        name="subject" placeholder="Enter Subject">
                    @error('subject')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="inputmessage" class="fw-bold">Your Message</label>
                    <textarea wire:model="msg" class="form-control rounded" id="message" name="message" placeholder="Enter Your Message"
                        rows="6"></textarea>
                    @error('msg')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="row justify-content-end">

                    <div class="col-auto">
                        <button wire:click.prevent="sendMessage" class="btn btn-primary btn-lg rounded-pill">Send
                            Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact Form -->

</div>
