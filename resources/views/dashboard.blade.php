@extends('layouts.app')
@section('content')



    <h2 class="font-bold text-4xl text-black-700 my-4 mx-3">Dashboard</h2> 
    <hr class="h-1 bg-blue-200">
    
   
    <div class="mt-4 grid grid-cols-3 gap-10">
      <a href="{{ route('product.index') }}" class="px-4 py-8 rounded-lg bg-blue-600 text-white felx justify-between">
          <p class="font-bold text-lg">Total Products</p>
          <p class="font-bold text-5xl">{{$products}}</p>
      </a>
  
      <a href="{{ route('brand.index') }}" class="px-4 py-8 rounded-lg bg-green-600 text-white felx justify-between">
          <p class="font-bold text-lg">Total Brand</p>
          <p class="font-bold text-5xl">{{$brand}}</p>
      </a>
  
      <a href="{{ route('category.index') }}" class="px-4 py-8 rounded-lg bg-red-600 text-white felx justify-between">
          <p class="font-bold text-lg">Total Categories</p>
          <p class="font-bold text-5xl">{{$categories}}</p>
      </a>
  
      <a href="{{ route('order.details') }}" class="px-4 py-8 rounded-lg bg-green-600 text-white felx justify-between">
          <p class="font-bold text-lg">Total Order</p>
          <p class="font-bold text-5xl">{{$order}}</p>
      </a>
  
      <a href="{{ route('user.userdetails') }}" class="px-4 py-8 rounded-lg bg-green-600 text-white felx justify-between">
          <p class="font-bold text-lg">Total Users</p>
          <p class="font-bold text-5xl">{{$users}}</p>
      </a>
      <a href="{{ route('user.userdetails') }}" class="px-4 py-8 rounded-lg bg-green-600 text-white felx justify-between">
          <p class="font-bold text-lg">Total Admin</p>
          <p class="font-bold text-5xl">{{$admin}}</p>
      </a>
      
  </div>
  







<body>



  <div class=" text-left mx-8 mt-10">
    <!-- Chart wrapper -->
    <input type="month" onchange="changemonth(this.value)" value="{{date('Y-m')}}">
  </div>
  <div class="text-right mx-4">
    <h2 class="font-bold text-4xl">Monthly Details</h2>
    <p>Total Sales: <span id="totalSales">{{ $totalSales }}</span></p>
    <p>Total Profit: <span id="totalProfit">{{ $totalProfit }}</span></p>
    <p>Total Orders: <span id="totalOrders">{{ $totalOrders }}</span></p>
</div>



  <div class="container mx-auto px-4 py-8">
    
    <canvas id="myLineChart" class="w-full h-100 mt-4"></canvas>
  </div>


  <script>

function changemonth(date){

  $.ajax({
        url: "{{ route('changemonth')}}", // Replace with your server API endpoint
        method: "POST",
        dataType: "json",
        data:{
          month:date,
          _token:"{{csrf_token()}}"
        },
        success: function(response) {
          // Update the content with the fetched data
        //  console.log(response.sales);
         myLineChart.data.datasets[0].data=response.sales; 
         myLineChart.data.datasets[1].data=response.profits; 
         myLineChart.data.datasets[2].data=response.ordercounts; 

          
         myLineChart.data.labels=response.orderdates; 



         myLineChart.update();
         document.getElementById("totalSales").textContent = response.totalSales;
        document.getElementById("totalProfit").textContent = response.totalProfit;
        document.getElementById("totalOrders").textContent = response.totalOrders;



        

         console.log(response);

        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Handle error if the request fails
          console.error("AJAX request failed: " + textStatus, errorThrown);
        }
      });
}


    // Sample data for the line chart
    const labels = @json($orderdates);
    const totalSalesData = @json($sales); // Replace with your total sales data for each day of the month
    const totalProfitData = @json($profits); // Replace with your total profit data for each day of the month
    const totalOrdersData = @json($ordercount); // Replace with your total orders data for each day of the month

    // Configuration options
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    };

    // Get the canvas element and initialize the chart
    const ctx = document.getElementById('myLineChart').getContext('2d');
    const myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [
          {
        label: 'Daily Sales',
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            data: totalSalesData,
            fill: true,
      },
      {
        label: 'Daily Profit',
        borderColor: 'purple',
        backgroundColor: 'rgba(255, 165, 0, 0.2)',
        data: totalProfitData,
        fill: true,
      },
      {
        label: 'Daily Orders',
        borderColor: 'red',
        backgroundColor: 'rgba(255, 0, 0, 0.2)',
        data: totalOrdersData,
        fill: true,
      },
        ]
      },
      options: options
    });



    console.log(myLineChart.data.labels);






   

// Get the canvas element for the pie chart
const statisticsBarChartCanvas = document.getElementById('statisticsBarChart');

// Configuration options for the bar chart
const statisticsBarChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        x: {
            stacked: true
        },
        y: {
            stacked: true
        }
    }
};

// Initial data for the bar chart
const statisticsData = [{{$products}}, {{$brand}}, {{$categories}}, {{$order}}, {{$users}}, {{$admin}}];
const statisticsLabels = ['Total Products', 'Total Brand', 'Total Categories', 'Total Order', 'Total Users', 'Total Admin'];

// Create a bar chart using Chart.js
const statisticsBarChart = new Chart(statisticsBarChartCanvas, {
    type: 'bar',
    data: {
        labels: statisticsLabels,
        datasets: [{
            label: 'Statistics Data',
            data: statisticsData,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800', '#9C27B0'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800', '#9C27B0']
        }]
    },
    options: statisticsBarChartOptions
});





//Orders Sales
// Configuration options for the pie chart
const pieChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
        position: 'bottom'
    }
};

// Get the canvas element for the pie chart
const pieChartCanvas = document.getElementById('monthlyPieChart');

// Initial data for the pie chart
const initialPieChartData = [{{ $totalSales }}, {{ $totalProfit }}, {{ $totalOrders }}];
const pieChartLabels = ['Total Sales', 'Total Profit', 'Total Orders'];

// Create a pie chart using Chart.js
const myPieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: {
        labels: pieChartLabels,
        datasets: [{
            data: initialPieChartData,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    },
    options: pieChartOptions
});

// Function to change pie chart data based on selected month
function month(date) {
    $.ajax({
        url: "{{ route('month')}}", // Replace with your server API endpoint
        method: "POST",
        dataType: "json",
        data: {
            month: date,
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            myPieChart.data.datasets[0].data = [response.totalSales, response.totalProfit, response.totalOrders];
            myPieChart.update();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX request failed: " + textStatus, errorThrown);
        }
    });
}





















</script>





















 
</body>


@endsection