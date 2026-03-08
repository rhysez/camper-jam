import { Head, Link, usePage } from '@inertiajs/react';
import { Spline } from 'lucide-react';
import { dashboard, login, register } from '@/routes';

export default function Welcome({
    canRegister = true,
}: {
    canRegister?: boolean;
}) {
    const { auth } = usePage().props;

    const linkStyles = "px-4 py-2 rounded-full font-bold text-neutral-800 hover:bg-alpine hover:text-background transition-colors";

    return (
        <>
            <Head title="Welcome">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link
                    href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
                    rel="stylesheet"
                />
            </Head>
            <div className="min-h-screen bg-mountain-dusk p-8">
                <nav className="flex justify-between">
                    <div className={"flex items-center gap-2"}>
                        <h2 className={'text-3xl font-black text-background'}>
                            CamperJam
                        </h2>
                        <Spline size={28} className={'text-background'} />
                    </div>
                    <>
                        {auth.user ? (
                            <Link href={dashboard()} className="">
                                Dashboard
                            </Link>
                        ) : (
                            <div className={'space-x-4'}>
                                <Link
                                    href={login()}
                                    className={`bg-background ${linkStyles}`}
                                >
                                    Log in
                                </Link>
                                {canRegister && (
                                    <Link
                                        href={register()}
                                        className={`bg-limestone ${linkStyles}`}
                                    >
                                        Create account
                                    </Link>
                                )}
                            </div>
                        )}
                    </>
                </nav>
            </div>
        </>
    );
}
