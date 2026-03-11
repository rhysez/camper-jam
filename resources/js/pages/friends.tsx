import { router } from '@inertiajs/react';

type Props = {
    friends: {
        id: string;
        name: string;
        is_travelling: boolean;
    }[],
    filters: {status: string}
}

export default function Friends({ friends, filters }: Props) {
    const handleStatusChange = (newStatus: string) => {
        router.get('/friends', {status: newStatus}, {preserveState: true, replace: true})
    }

    console.log(filters);
    return (
        <>

            <div>
                <select
                    value={filters.status || ''}
                    onChange={(e) => handleStatusChange(e.target.value)}
                    className={"bg-ash"}
                >
                    <option value="">All Friends</option>
                    <option value="accepted">Accepted</option>
                    <option value="pending">Pending</option>
                </select>

                <ul>
                {friends.map((friend) => (
                    <li className="text-ash" key={friend.id}>
                        {friend.name}
                    </li>
                ))}
            </ul>
            </div>
        </>
    );
}
