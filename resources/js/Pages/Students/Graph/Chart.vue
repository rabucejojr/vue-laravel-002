<script setup>
import { ref, onMounted, watch } from 'vue';
import Highcharts from 'highcharts';

// Props to receive the students data from parent
    const props = defineProps({
    students: Array,
    });

// Prepare chart options dynamically based on the students
    const chartOptions = ref({
    chart: {
        type: 'column', // Example: column chart
    },
    title: {
        text: 'Students Data',
    },
    xAxis: {
        categories: props.students.map(student => student.barangay || student.municipality || student.province),
        title: {
        text: 'students',
        },
    },
    yAxis: {
        title: {
        text: 'Number of Records',
        },
    },
    series: [
        {
        name: 'students',
        data: props.students.map(student => student.records_count), // Assuming you have a field for counts
        },
    ],
    });

// Re-render the chart when the students data changes
watch(
    () => props.students,
    (newStudents) => {
        chartOptions.value.xAxis.categories = newStudents.map(
        student => student.barangay || student.municipality || student.province
        );
        chartOptions.value.series[0].data = newStudents.map(student => student.records_count);
        Highcharts.chart('chart-container', chartOptions.value);
    },
    );

    onMounted(() => {
    Highcharts.chart('chart-container', chartOptions.value);
    });
</script>

<template>
    <div id="chart-container"></div>
</template>

  <style scoped>
  #chart-container {
    width: 100%;
    height: 400px;
  }
  </style>
