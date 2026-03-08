import { Head, Link, usePage } from '@inertiajs/react';
import CamperJamTypeLogo from '@/components/custom/brand/CamperJamTypeLogo';
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
                    <CamperJamTypeLogo />
                    <>
                        {auth.user ? (
                            <Link href={dashboard()} className={`bg-limestone ${linkStyles}`}>
                                Jump back in
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
                                        className={`bg-limestone outline-2 outline-offset-2 ${linkStyles}`}
                                    >
                                        Create account
                                    </Link>
                                )}
                            </div>
                        )}
                    </>
                </nav>
                <div className={"bg-alpine text-background mt-24 mx-auto text-center rounded-full outline-2 outline-offset-2 outline-alpine p-2 px-6 w-fit"}>
                    Nothing here yet!
                </div>
            </div>
        </>
    );
}
