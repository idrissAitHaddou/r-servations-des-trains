
/*
**
**
*********** static of reservation
**
** 
*/

    async function fetchDataJSON() {
        const response = await fetch('http://trains.ma/admin/getReservationStatic');
        const Data = await response.json();
        return Data;
    } 

    fetchDataJSON().then(Data => {
            const d = new Date();
            const ct = document.getElementById('resrvationSta').getContext('2d');
            const myChartOb = new Chart(ct, {
                type: 'line',
                data: {
                    labels: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin' , 'juillet', 'août ', 'septembre', 'octobre', 'novembre ', 'décembre'],
                    datasets: [{
                        label: 'Les reservation ( '+d.getFullYear()+' )',
                        data: [Data[0], Data[1], Data[2], Data[3], Data[4], Data[5] , Data[6], Data[7], Data[8], Data[9], Data[10], Data[12]],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
    });




/*
**
**
*********** static of client
**
** 
*/


    async function fetchDataJSON() {
            const response = await fetch('http://trains.ma/admin/getClientSta');
            const Data = await response.json();
            return Data;
    } 

    fetchDataJSON().then(Data => {
            const d = new Date();
            const ct = document.getElementById('clientStatic').getContext('2d');
            const myChartOb = new Chart(ct, {
                type: 'line',
                data: {
                    labels: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin' , 'juillet', 'août ', 'septembre', 'octobre', 'novembre ', 'décembre'],
                    datasets: [{
                        label: 'Les client ( '+d.getFullYear()+' )',
                        data: [Data[0], Data[1], Data[2], Data[3], Data[4], Data[5] , Data[6], Data[7], Data[8], Data[9], Data[10], Data[12]],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
    });



/*
**
**
*********** static of reservation
**
** 
*/

    async function fetchDataJSON() {
        const response = await fetch('http://trains.ma/admin/getReservationStatic');
        const Data = await response.json();
        return Data;
    } 

    fetchDataJSON().then(Data => {
            const d = new Date();
            const ct = document.getElementById('resrvationStaBar').getContext('2d');
            const myChartOb = new Chart(ct, {
                type: 'bar',
                data: {
                    labels: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin' , 'juillet', 'août ', 'septembre', 'octobre', 'novembre ', 'décembre'],
                    datasets: [{
                        label: 'Les reservation ( '+d.getFullYear()+' )',
                        data: [Data[0], Data[1], Data[2], Data[3], Data[4], Data[5] , Data[6], Data[7], Data[8], Data[9], Data[10], Data[12]],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
    });

