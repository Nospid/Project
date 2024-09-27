@extends('master')
@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <title>About Us </title>
</head>

<body class="bg-gray-100">

 
    

  <!-- Main Content -->
  <div class="container mx-auto py-12 px-4">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">About Us</h1>

    <div class="flex flex-col md:flex-row md:space-x-8">

      <div class="md:w-1/2 w-7">
        <img class="rounded-lg shadow-lg w-96" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_N5M2OG-EGvCVgWbr7mnqrxU9fpCQx1slBM92AOodfpqrVo8IJ89V0K6eCCsIVUuHXNM" alt="About Image">
      </div>

      <div class="md:w-1/2 mt-4 md:mt-0">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Our Story</h2>
        <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dignissim mauris sed placerat. Nullam volutpat odio sed sagittis commodo. Sed venenatis lobortis mauris at pulvinar. Mauris vel rutrum nulla, ac lobortis turpis.</p>
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Our Mission</h2>
        <p class="text-gray-700 mb-4">Praesent id elit aliquam, pharetra elit non, lacinia neque. Integer eget semper mauris. Nam euismod ex vel est laoreet efficitur. Nam luctus venenatis venenatis.</p>
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Our Vision</h2>
        <p class="text-gray-700">Sed malesuada sapien ac justo tincidunt, in elementum nulla efficitur. Maecenas sollicitudin, dolor ac lobortis egestas, neque neque lacinia diam, sed pellentesque nisi ex eu lectus.</p>
      </div>

    </div>

  </div>

  <!-- Footer -->


</body>

</html>


    
@endsection