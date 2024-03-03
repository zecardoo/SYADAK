<template lang="">
 
  <div class="w-[70rem]">
      <Bar
      id="my-chart-id"
      :options="chartOptions"
      :data="chartData"
    /> 
  </div>
</template>
<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
  name: 'BarChart',
  components: { Bar },
  data() {
    return {
      type: 'bar',

      chartData: {
        labels: ['Total Sales', 'Total Expenses', 'Total Income', 'Product Sold', 'Users'],

        datasets: [{
          label: 'Dasborad Data',
          data: [this.productTotal, 20, 12, this.productSold, this.userCount],
          backgroundColor: '#f87979',
          font: {
            size: 14
          },
        }],
        borderColor: '#36A2EB',


      },
      chartOptions: {
        responsive: true
      }
    }
  },

  props: ['productTotal', 'productSold', 'userCount'],

  mounted(){
    // console.log('Total', this.productTotal);
  }
}
</script>
