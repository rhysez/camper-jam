import { AppContent } from '@/components/app-content';
import { AppShell } from '@/components/app-shell';
import { AppSidebar } from '@/components/app-sidebar';
import type { AppLayoutProps } from '@/types';

export default function AppSidebarLayout({
    children,
    breadcrumbs = [],
}: AppLayoutProps) {
    return (
        <AppShell variant="header">
            <AppSidebar />
            <AppContent variant="header" className="overflow-x-hidden bg-mountain-dusk">
                {children}
            </AppContent>
        </AppShell>
    );
}
