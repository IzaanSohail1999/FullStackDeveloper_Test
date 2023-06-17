import React, {useEffect, useState} from 'react';
import AttendanceTable from './AttendanceTable';

//App function
const App = () => {
    const [attendance, setAttendance] = useState([]);

    useEffect(() => {
        // Fetch attendance data from the API
        fetch('api/attendance')
            .then((response) => response.json())
            .then((data) => setAttendance(data));
    }, []);

    const onUpload = (formData) => {
        fetch('http://127.0.0.1:8000/api/attendance/upload', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                    console.log('Attendance uploaded successfully');
                } else {
                    // Handle error response
                    throw new Error('Attendance upload failed');
                }
            })
            .catch(error => {
                // Handle error
                console.error('Error uploading attendance:', error.message);
            });
    };


    return (
        <div style={{display: 'flex', flexDirection: 'column', alignItems: 'space_between', width: '80%'}}>
            <h1 style={{display: 'flex', flexDirection: 'column', alignItems: 'center'}}>Attendance Information</h1>
            <AttendanceTable attendance={attendance} onUpload={onUpload}/>
        </div>

    );
};

export default App;