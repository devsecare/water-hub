@extends('layouts.frontend')

@section('title', 'Contact Us - PPP Water Hub')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-16">
    <h1 class="text-4xl font-bold text-[#1E1D57] mb-8">Contact Us</h1>
    <p class="text-lg text-gray-700 mb-8">
        Have questions or feedback? We'd love to hear from you. Get in touch with our team.
    </p>
    
    <div class="bg-white rounded-lg shadow-md p-8">
        <form class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                <textarea id="message" name="message" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            
            <button type="submit" class="bg-[#37C6F4] text-white px-6 py-3 rounded-lg hover:bg-[#2FA3E0] transition">
                Send Message
            </button>
        </form>
    </div>
</section>
@endsection

