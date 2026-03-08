import { Spline } from 'lucide-react';

export default function CamperJamTypeLogo() {
    return (
        <div className={'flex items-center gap-2'}>
            <h2 className={'text-3xl font-black text-background'}>CamperJam</h2>
            <Spline size={28} className={'text-background'} />
        </div>
    );
}
