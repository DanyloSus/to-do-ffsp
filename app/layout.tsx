import type { Metadata } from "next";
import { Inter } from "next/font/google";
import "./globals.css";
import Link from "next/link";

const inter = Inter({ subsets: ["latin"] });

export const metadata: Metadata = {
  title: "To Do",
  description: "To Do app",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body className={`${inter.className} text-center w-screen`}>
        <header className="flex m-3 p-3 items-center justify-start border-b border-b-grey">
          <h1 className="text-4xl font-bold hover:text-5xl transition-all">
            <Link href="/">To Do</Link>
          </h1>
        </header>
        {children}
      </body>
    </html>
  );
}
