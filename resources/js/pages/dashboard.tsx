import AppLayout from "@/layouts/app-layout";
import AppHeaderLayout from "@/layouts/app/app-header-layout";
import { User } from "@/types";

type Props = { users: User[] };

export default function Feed({ users }: Props) {
    console.log(users)
    return (
        <AppHeaderLayout>
            <p>Hello</p>
        </AppHeaderLayout>
    );
}
