import React from 'react';
import Pagination from 'react-bootstrap/Pagination';

export default function PaginationComponent({ total, pageCurrent, onPageChange }) {
    let active = pageCurrent;
    let items = [];

    for (let number = 1; number <= total; number++) {
        items.push(
            <Pagination.Item
                key={number}
                active={number === active}
                onClick={() => onPageChange(number)}
            >
                {number}
            </Pagination.Item>,
        );
    }

    return (
        <div>
            <Pagination size="sm">{items}</Pagination>
        </div>
    );
}
