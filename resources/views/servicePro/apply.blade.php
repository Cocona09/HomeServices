<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiceNest</title>
    <link rel="stylesheet" href="{{asset('css/apply.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
   <div>
       @include('layouts.frontend.header')
   </div>

   <div>
       @if(session()->has('apply'))
           <script>
               Swal.fire({
                   title: "Good job!",
                   text: " {{ session('apply') }}",
                   icon: "success"
               });
           </script>
       @endif
   </div>
   <div>
       <img class="jobapp" src="{{asset('uploads/images/jobapp.png')}}">
   </div>
<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form method="POST" action="{{ route('servicePro.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="lastname" class="formbold-form-label"> Овог </label>
                <input
                    type="text"
                    name="lastname"
                    id="lastname"
                    placeholder="Таны овог..."
                    class="formbold-form-input"
                    required
                />
            </div>

            <div>
                <div>
                    <label for="firstname" class="formbold-form-label"> Нэр </label>
                    <input
                        type="text"
                        name="firstname"
                        id="firstname"
                        placeholder="Таны нэр..."
                        class="formbold-form-input"
                        required
                    />
                </div>
            </div>

            <div class="formbold-input-flex">
                <div>
                    <label for="email" class="formbold-form-label"> Имэйл хаяг </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Таны имэйл хаяг..."
                        class="formbold-form-input"
                        required
                    />
                </div>

                <div>
                    <label class="formbold-form-label">Хүйс</label>

                    <select class="formbold-form-input" name="gender" id="gender">
                        <option value="эрэгтэй">Эрэгтэй</option>
                        <option value="эмэгтэй">Эмэгтэй</option>
                        <option value="бусад">Бусад</option>
                    </select>
                </div>
            </div>

            <div class="formbold-mb-3 formbold-input-wrapp">
                <label for="phone" class="formbold-form-label"> Утас дугаар </label>

                <div>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        placeholder="Таны утасны дугаар..."
                        class="formbold-form-input"
                        required
                    />
                </div>
            </div>

            <div class="formbold-mb-3">
                <label for="job" class="formbold-form-label"> Албан тушаал </label>
                <input
                    type="text"
                    name="job"
                    id="job"
                    placeholder="ажил..."
                    class="formbold-form-input"
                    required
                />
            </div>
            <div class="formbold-input-flex">
                <div>
                    <label for="text" class="formbold-form-label"> Гадаад хэл: </label>
                    <input
                        type="text"
                        name="languages"
                        id="languages"
                        placeholder="Гадаад хэл..."
                        class="formbold-form-input"
                        required
                    />
                </div>

                <div>
                    <label class="formbold-form-label">Ажлын туршлага:</label>
                    <input
                        type="text"
                        name="experience"
                        id="experience"
                        placeholder="Таны ажлын туршлага..."
                        class="formbold-form-input"
                        required
                    />
                </div>
            </div>

            <div class="formbold-mb-3">
                <label for="age" class="formbold-form-label"> Нас </label>
                <input
                    type="text"
                    name="age"
                    id="age"
                    placeholder="Таны нас..."
                    class="formbold-form-input"
                    required
                />
            </div>

            <div class="formbold-mb-3">
                <label for="address" class="formbold-form-label"> Хаяг </label>
                <input
                    type="text"
                    name="address"
                    id="address"
                    placeholder="Хаяг..."
                    class="formbold-form-input formbold-mb-3"
                    required
                />
            </div>

            <div class="formbold-mb-3">
                <label for="message" class="formbold-form-label">
                    Эссэ
                </label>
                <textarea
                    rows="6"
                    name="message"
                    id="message"
                    class="formbold-form-input"
                    required
                ></textarea>
            </div>

            <div class="formbold-form-file-flex">
                <label for="image" class="formbold-form-label">
                   Зураг оруулах
                </label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="formbold-form-file"
                    required
                />
            </div>

            <button class="formbold-btn">Хүсэлт явуулах</button>
        </form>
    </div>
</div>
 @include('layouts.frontend.footer')
</body>
</html>
