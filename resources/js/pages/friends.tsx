import { usePage } from "@inertiajs/react";

type Props = {
    friends: {
        id: string;
        name: string;
    }[]
}

export default function Friends({ friends }: Props) {
    console.log(friends);
    return (
        <ul>
            {friends.map(friend => (<li className="text-ash" key={friend.id}>{friend.name}</li>))}
        </ul>
    )
}
