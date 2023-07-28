<template>
  <Line id="my-chart-id" :options="chartOptions" :data="chartData" />
</template>

<script>
import "chart.js/auto";
import { Line } from "vue-chartjs";
import { Chart, PointElement } from "chart.js";

Chart.register(PointElement);
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  LineElement,
  CategoryScale,
  LinearScale,
} from "chart.js";

ChartJS.register(
  Title,
  Tooltip,
  Legend,
  CategoryScale,
  LinearScale,
  LineElement
);

export default {
  name: "BarChart",
  components: { Line },
  props: ["data"],
  created() {
    if (this.data) {
      (this.countPaymentMoth1 = this.data.countPaymentMoth1.length
        ? this.fomart(this.data.countPaymentMoth1)
        : 0),
        (this.countPaymentMoth2 = this.data.countPaymentMoth2
          ? this.fomart(this.data.countPaymentMoth2)
          : 0),
        (this.countPaymentMoth3 = this.data.countPaymentMoth3
          ? this.fomart(this.data.countPaymentMoth3)
          : 0),
        (this.countPaymentMoth4 = this.data.countPaymentMoth4
          ? this.fomart(this.data.countPaymentMoth4)
          : 0),
        (this.countPaymentMoth5 = this.data.countPaymentMoth5
          ? this.fomart(this.data.countPaymentMoth5)
          : 0),
        (this.countPaymentMoth6 = this.data.countPaymentMoth6
          ? this.fomart(this.data.countPaymentMoth6)
          : 0),
        (this.countPaymentMoth7 = this.data.countPaymentMoth7
          ? this.fomart(this.data.countPaymentMoth7)
          : 0),
        (this.countPaymentMoth8 = this.data.countPaymentMoth8
          ? this.fomart(this.data.countPaymentMoth8)
          : 0),
        (this.countPaymentMoth9 = this.data.countPaymentMoth9
          ? this.fomart(this.data.countPaymentMoth9)
          : 0),
        (this.countPaymentMoth10 = this.data.countPaymentMoth10
          ? this.fomart(this.data.countPaymentMoth10)
          : 0),
        (this.countPaymentMoth11 = this.data.countPaymentMoth11
          ? this.fomart(this.data.countPaymentMoth11)
          : 0),
        (this.countPaymentMoth12 = this.data.countPaymentMoth12
          ? this.fomart(this.data.countPaymentMoth12)
          : 0);
    }
  },
  data() {
    return {
      countPaymentMoth1: 0,
      countPaymentMoth2: 0,
      countPaymentMoth3: 0,
      countPaymentMoth4: 0,
      countPaymentMoth5: 0,
      countPaymentMoth6: 0,
      countPaymentMoth7: 0,
      countPaymentMoth8: 0,
      countPaymentMoth9: 0,
      countPaymentMoth10: 0,
      countPaymentMoth11: 0,
      countPaymentMoth12: 0,
      chartData: {
        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
        datasets: [
          {
            label: "Doanh thu",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [
              this.countPaymentMoth1,
              this.countPaymentMoth2,
              this.countPaymentMoth3,
              this.countPaymentMoth4,
              this.countPaymentMoth5,
              this.countPaymentMoth6,
              this.countPaymentMoth7,
              this.countPaymentMoth8,
              this.countPaymentMoth9,
              this.countPaymentMoth10,
              this.countPaymentMoth11,
              this.countPaymentMoth12,
            ],
          },
        ],
      },
      chartOptions: {
        responsive: true,
      },
    };
  },
  methods: {
    fomart(data) {
      console.log(data[0]['price']);
    },
  },
};
</script>