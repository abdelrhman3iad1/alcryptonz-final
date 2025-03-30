@extends('Dashboard.layouts.layouts')

@section('title')
    المقالات
@endsection

@section('content')
    @section('css')
    @endsection

    @section('scripts')
    @endsection

    @include('messages.errors')
    @include('messages.success')

    <div class="page-heading">
        <h3>رؤية المقال</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ $post->title_ar }}</h2>
                <div class="actions" style="display: flex; gap: 10px; margin-top: 5px; justify-content: flex-end;">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary" rel="noopener noreferrer">
                        التعديل
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post" style="margin: 0;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">حذف</button>
                    </form>
                </div>
            </div>

            <div class="card-body bilingual-content-container">
                <!-- Content wrapper with enhanced styling -->
                <div class="content-wrapper" style="display: flex; flex-wrap: wrap; gap: 20px; width: 100%;">
                    <!-- Arabic Content Section -->
                    <div class="content-block content-block-ar" style="flex: 1; min-width: 300px; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                        <div dir="rtl" class="text-right">
                            <h3 class="section-title mb-3" style=" font-weight: 600; border-bottom: 2px solid hsla(0, 0%, 87%, 0.2); padding-bottom: 10px;">العنوان بالعربية</h3>
                            <div class="title-content mb-4" style="font-size: 1.1rem;">{{ $post->title_ar }}</div>
                            
                            <h3 class="section-title mb-3" style=" font-weight: 600; border-bottom: 2px solid hsla(0, 0%, 87%, 0.2); padding-bottom: 10px;">المحتوى بالعربية</h3>
                            <div class="content-container" style="max-height: 500px; overflow-y: auto; line-height: 1.6;">
                                <textarea col="30" rows="10" class="form-control"name="postContent" id="content_ar" readonly >
                                    {{($post->content_ar)}}
                                  </textarea>

                                    {{-- {!! strip_tags($post->content_ar) !!} --}}
                            </div>
                        </div>
                    </div>
                    
                    <!-- English Content Section -->
                    <div class="content-block content-block-en" style="flex: 1; min-width: 300px; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                        <div dir="ltr">
                            <h3 class="section-title mb-3" style=" font-weight: 600; border-bottom: 2px solid hsla(0, 0%, 87%, 0.2); padding-bottom: 10px;">Title in English</h3>
                            <div class="title-content mb-4" style="font-size: 1.1rem;">{{ $post->title_en }}</div>
                            
                            <h3 class="section-title mb-3" style=" font-weight: 600; border-bottom: 2px solid hsla(0, 0%, 87%, 0.2); padding-bottom: 10px;">Content in English</h3>
                            <div class="content-container" style="max-height: 500px; overflow-y: auto; line-height: 1.6;">
                                {{-- {!! strip_tags($post->content_ar) !!} --}}
                                <textarea col="30" rows="10" class="form-control"name="postContent" id="content_en" readonly>
                                    {{($post->content_en)}}
                                  </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Section -->
            <div class="card-image mt-4" style="text-align: center; display: flex; justify-content: center; align-items: center;">
                @if ($post->image)
                    <div class="col-md-7 my-4" style="display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title_en }}" style="max-width: 100%; height: auto;">
                    </div>
                @else
                    <p>لا توجد صورة مرفقة.</p>
                @endif
            </div>
        </div>
    </section>
@endsection