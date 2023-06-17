import React, { useState } from 'react';

const AttendanceTable = ({ attendance, onUpload }) => {
    const [selectedFile, setSelectedFile] = useState(null);

    const handleFileChange = (event) => {
        setSelectedFile(event.target.files[0]);
    };

    const handleUpload = () => {
        if (selectedFile) {
            const formData = new FormData();
            formData.append('file', selectedFile);
            onUpload(formData);
        }
    };

    return (
        <div>
        <h2 style={{ textAlign: 'center' }}>Attendance Table</h2>
    <div style={{ textAlign: 'center', width: "30%" , marginLeft: "20%"}}>
<input type="file" accept=".xlsx, .xls" onChange={handleFileChange} />
    <button onClick={handleUpload} disabled={!selectedFile}>
    Submit
    </button>
    </div>
    <table style={{ marginTop: '25px', marginLeft: '25%',borderCollapse: 'collapse',  textAlign: 'center', width: "80%" }}>
<thead>
    <tr>
    <th style={{ background: '#f2f2f2', padding: '8px', textAlign: 'center' }}>Name</th>
    <th style={{ background: '#f2f2f2', padding: '8px', textAlign: 'center' }}>Check-in</th>
    <th style={{ background: '#f2f2f2', padding: '8px', textAlign: 'center' }}>Check-out</th>
    <th style={{ background: '#f2f2f2', padding: '8px', textAlign: 'center' }}>Total Working Hours</th>
    </tr>
    </thead>
    <tbody>
    {attendance.map((record) => (
            <React.Fragment key={record.employee_id}>
        <tr>
        <td style={{ borderBottom: '1px solid #ddd', padding: '8px', textAlign: 'center' }}>{record.employee_name}</td>
    <td style={{ borderBottom: '1px solid #ddd', padding: '8px', textAlign: 'center' }}>{record.attendance[0]?.schedule?.shift?.start_time || 'N/A'}</td>
    <td style={{ borderBottom: '1px solid #ddd', padding: '8px', textAlign: 'center' }}>{record.attendance[0]?.schedule?.shift?.end_time || 'N/A'}</td>
    <td style={{ borderBottom: '1px solid #ddd', padding: '8px', textAlign: 'center' }}>{record.total_working_hours}</td>
    </tr>
    {record.attendance.slice(1).map((attendance, index) => (
        <tr key={index}>
        <td style={{ borderBottom: '1px solid #ddd', padding: '8px', textAlign: 'center' }}></td>
    <td style={{ borderBottom: '1px solid #ddd', padding: '8px', textAlign: 'center' }}>{attendance.schedule?.shift?.start_time || 'N/A'}</td>
    <td style={{ borderBottom: '1px solid #ddd', padding: '8px', textAlign: 'center' }}>{attendance.schedule?.shift?.end_time || 'N/A'}</td>
    <td style={{ borderBottom: '1px solid #ddd', padding: '8px', textAlign: 'center' }}></td>
    </tr>
    ))}
</React.Fragment>
))}
</tbody>
    </table>
    </div>
);
};

export default AttendanceTable;