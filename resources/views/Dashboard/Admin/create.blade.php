@extends('Dashboard.layouts.layouts')
@section('title', 'تعيين مسؤول')
@section('content')
<div class="page-heading">
    <h3>تعيين مسؤول</h3>
</div>

@include('messages.errors')
@include('messages.success')

<section class="section">
    <div class="card">
        <div class="card-body">
            <form id="searchForm">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <button type="submit" class="btn btn-primary">بحث</button>
            </form>
        </div>
    </div>

    <!-- Results Section - Hidden by default -->
    <div class="card mt-3" id="resultsCard" style="display: none;">
        <div class="card-header">
            <h5 class="card-title">نتائج البحث</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>الصلاحية</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody id="searchResults">
                        <!-- Results will be displayed here -->
                    </tbody>
                </table>
            </div>
            <div id="noResults" class="alert alert-info" style="display: none;">
                لا توجد نتائج مطابقة للبحث
            </div>
        </div>
    </div>
</section>

<!-- Add the JavaScript for Ajax -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.getElementById('searchForm');
        const resultsCard = document.getElementById('resultsCard');
        const searchResults = document.getElementById('searchResults');
        const noResults = document.getElementById('noResults');

        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const email = formData.get('email');
            
            // Validate email format client-side
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('يرجى إدخال بريد إلكتروني صحيح');
                return;
            }
            
            // Send Ajax request
            fetch('{{ route('admin.search') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Clear previous results
                searchResults.innerHTML = '';
                
                if (data.users && data.users.length > 0) {
                    // Display results
                    data.users.forEach(user => {
                        const isAdmin = user.role === 1;
                        searchResults.innerHTML += `
                            <tr data-user-id="${user.id}">
                                <td>${user.name || ''}</td>
                                <td>${user.email || ''}</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role_${user.id}" value="0" 
                                            ${!isAdmin ? 'checked' : ''} id="user_${user.id}">
                                        <label class="form-check-label" for="user_${user.id}">مستخدم عادي</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role_${user.id}" value="1" 
                                            ${isAdmin ? 'checked' : ''} id="admin_${user.id}">
                                        <label class="form-check-label" for="admin_${user.id}">مسؤول</label>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary change-role-btn" data-user-id="${user.id}">
                                        تعيين 
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    
                    // Add event listeners to change role buttons
                    document.querySelectorAll('.change-role-btn').forEach(button => {
                        button.addEventListener('click', function() {
                            const userId = this.getAttribute('data-user-id');
                            const selectedRole = document.querySelector(`input[name="role_${userId}"]:checked`).value;
                            
                            changeUserRole(userId, selectedRole);
                        });
                    });
                    
                    resultsCard.style.display = 'block';
                    noResults.style.display = 'none';
                } else {
                    // Show no results message
                    resultsCard.style.display = 'block';
                    noResults.style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء البحث');
            });
        });
        
        // Function to change user role
        function changeUserRole(userId, role) {
            // Create form data
            const formData = new FormData();
            formData.append('user_id', userId);
            formData.append('role', role);
            formData.append('_token', '{{ csrf_token() }}');
            
            // Send Ajax request
            fetch('{{ route('admin.changeRole') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('تم تغيير صلاحية المستخدم بنجاح');
                } else {
                    alert(data.message || 'حدث خطأ أثناء تغيير صلاحية المستخدم');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء تغيير صلاحية المستخدم');
            });
        }
    });
</script>
@endsection