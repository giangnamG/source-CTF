import { useEffect, useState } from 'react';
import { Table, Button } from 'react-bootstrap';
import axiosClient from '../axiosClient'
import PaginationComponent from './PaginationComponent';

export default function Users() {
    const [users, setUsers] = useState([])
    const [pageCurrent, setPageCurrent] = useState(2)
    const [total, setTotal] = useState(0)

    useEffect(() => {
        axiosClient.post('/users', {
            "page": pageCurrent,
            "per_page": 10
        }).then((res) => {
            setUsers(res.data.users)
            setTotal(res.data.pagination.total / res.data.pagination.per_page)
        })
    }, [pageCurrent])
    const handlePageChange = (pageNumber) => {
        console.log(`Selected page: ${pageNumber}`);
        setPageCurrent(pageNumber);
    };
    return (
        <div>
            <h3>User List</h3>
            <Table striped bordered hover>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Flag</th>
                        <th>Role</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        users.map((user, index) => (
                            <tr key={user.id}>
                                <td>{index + 1 + (pageCurrent - 1) * 10}</td>
                                <td>{user.username}</td>
                                <td>{user.email}</td>
                                <td>{user.flag}</td>
                                <td>{user.role}</td>
                                <td> <Button variant="primary">Primary</Button>{' '}</td>
                            </tr>
                        ))
                    }
                </tbody>
            </Table>
            <PaginationComponent total={total} pageCurrent={pageCurrent} onPageChange={handlePageChange} />
        </div>
    )
}